package mysql

import (
	"context"
	"database/sql"
	"errors"
	"github.com/DATA-DOG/go-sqlmock"
	"homarket/internal/inventoryControl"
	"homarket/kit/constants"
	"reflect"
	"testing"
)

func TestNewInventoryCatalogRepo(t *testing.T) {
	type args struct {
		db *sql.DB
	}

	db, _, err := sqlmock.New()
	if err != nil {
		t.Fatalf("an error '%s' was not expected when opening a stub database connection", err.Error())
	}
	defer db.Close()

	tests := []struct {
		name string
		args args
		want *inventoryCatalogRepo
	}{
		{
			name: "TestNewInventoryCatalogRepo",
			args: args{
				db: db,
			},
			want: &inventoryCatalogRepo{
				db: db,
			},
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewInventoryCatalogRepo(tt.args.db); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewInventoryCatalogRepo() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_inventoryCatalogRepo_GetInventoryFromRepository(t *testing.T) {
	type fields struct {
		db *sql.DB
	}
	type args struct {
		ctx context.Context
	}

	db, mock, err := sqlmock.New()
	if err != nil {
		t.Fatalf("an error '%s' was not expected when opening a stub database connection", err.Error())
	}
	defer db.Close()

	row := sqlmock.NewRows([]string{"id", "nombre", "precio", "existencia", "imagen", "id_categoria", "id_subcategoria"}).AddRow(1, "microondas", 50.99, 2, "micro.jpg", 1, 1)

	mock.ExpectQuery("SELECT").WillReturnRows(row)

	tests := []struct {
		name    string
		fields  fields
		args    args
		want    []inventoryControl.InventoryRegistersResponse
		wantErr bool
	}{
		{
			name: "GetInventory_Success",
			fields: fields{
				db: db,
			},
			args: args{
				ctx: context.Background(),
			},
			want: []inventoryControl.InventoryRegistersResponse{
				{
					Id:             1,
					Nombre:         "microondas",
					Precio:         50.99,
					Existencia:     2,
					Imagen:         "micro.jpg",
					IdCategoria:    1,
					IdSubCategoria: 1,
				},
			},
			wantErr: false,
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			i := &inventoryCatalogRepo{
				db: tt.fields.db,
			}
			got, err := i.GetInventoryFromRepository(tt.args.ctx)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetInventoryFromRepository() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetInventoryFromRepository() got = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_inventoryCatalogRepo_GetInventoryFromRepository_NoData(t *testing.T) {
	type fields struct {
		db *sql.DB
	}
	type args struct {
		ctx context.Context
	}

	db, mock, err := sqlmock.New()
	if err != nil {
		t.Fatalf("an error '%s' was not expected when opening a stub database connection", err.Error())
	}
	defer db.Close()

	row := sqlmock.NewRows([]string{"id", "nombre", "precio", "existencia", "imagen", "id_categoria", "id_subcategoria"})

	mock.ExpectQuery("SELECT").WillReturnRows(row)

	tests := []struct {
		name    string
		fields  fields
		args    args
		want    error
		wantErr bool
	}{
		{
			name: "GetInventory_NoDataFound",
			fields: fields{
				db: db,
			},
			args: args{
				ctx: context.Background(),
			},
			want:    constants.ErrorNotDataFound,
			wantErr: true,
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			i := &inventoryCatalogRepo{
				db: tt.fields.db,
			}
			_, err := i.GetInventoryFromRepository(tt.args.ctx)
			if !reflect.DeepEqual(err, tt.want) {
				t.Errorf("GetInventoryFromRepository() error = %v, want %v", err, tt.want)
			}
		})
	}
}

func Test_inventoryCatalogRepo_GetInventoryFromRepository_Failed(t *testing.T) {
	type fields struct {
		db *sql.DB
	}
	type args struct {
		ctx context.Context
	}

	db, mock, err := sqlmock.New()
	if err != nil {
		t.Fatalf("an error '%s' was not expected when opening a stub database connection", err.Error())
	}
	defer db.Close()

	row := sqlmock.NewRows([]string{"id", "nombre", "precio", "existencia", "imagen", "id_categoria"}).AddRow(1, "microondas", 50.99, 2, "micro.jpg", 1)

	mock.ExpectQuery("SELECT").WillReturnRows(row)

	db1, mock1, err := sqlmock.New()
	if err != nil {
		t.Fatalf("an error '%s' was not expected when opening a stub database connection", err.Error())
	}
	defer db1.Close()

	mock1.ExpectQuery("SELECT").WillReturnError(errors.New("failed"))

	tests := []struct {
		name    string
		fields  fields
		args    args
		want    []inventoryControl.InventoryRegistersResponse
		wantErr bool
	}{
		{
			name: "GetInventory_ScanError",
			fields: fields{
				db: db,
			},
			args: args{
				ctx: context.Background(),
			},
			want:    nil,
			wantErr: true,
		},
		{
			name: "GetInventory_QueryError",
			fields: fields{
				db: db1,
			},
			args: args{
				ctx: context.Background(),
			},
			want:    nil,
			wantErr: true,
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			i := &inventoryCatalogRepo{
				db: tt.fields.db,
			}
			got, err := i.GetInventoryFromRepository(tt.args.ctx)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetInventoryFromRepository() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetInventoryFromRepository() got = %v, want %v", got, tt.want)
			}
		})
	}
}
