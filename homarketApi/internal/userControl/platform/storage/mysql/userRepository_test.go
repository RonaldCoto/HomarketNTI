package mysql

import (
	"context"
	"database/sql"
	"errors"
	"github.com/DATA-DOG/go-sqlmock"
	userControl2 "homarket/internal/userControl"
	"homarket/kit/constants"
	"reflect"
	"testing"
)

func TestNewUserRepo(t *testing.T) {
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
		want *userRepo
	}{
		{
			name: "TestNewUserRepo_constructor",
			args: args{
				db: db,
			},
			want: &userRepo{
				db: db,
			},
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewUserRepo(tt.args.db); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewUserRepo() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_userRepo_GetUsersFromRepository(t *testing.T) {
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

	row := sqlmock.NewRows([]string{"id", "nombre", "email", "telefono", "password", "Categoria"}).AddRow(1, "jaime", "jaime@gmail.com", 25895214, "1458", "A")

	mock.ExpectQuery("SELECT").WillReturnRows(row)

	tests := []struct {
		name    string
		fields  fields
		args    args
		want    []userControl2.UserRegistersResponse
		wantErr bool
	}{
		{
			name: "GetUsers_Success",
			fields: fields{
				db: db,
			},
			args: args{
				ctx: context.Background(),
			},
			want: []userControl2.UserRegistersResponse{
				{
					Id:        1,
					Nombre:    "jaime",
					Email:     "jaime@gmail.com",
					Telefono:  25895214,
					Password:  "1458",
					Categoria: "A",
				},
			},
			wantErr: false,
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			i := &userRepo{
				db: tt.fields.db,
			}
			got, err := i.GetUsersFromRepository(tt.args.ctx)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetUsersFromRepository() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetUsersFromRepository() got = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_userRepo_GetUsersFromRepository_NoData(t *testing.T) {
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

	row := sqlmock.NewRows([]string{"id", "nombre", "email", "telefono", "password", "Categoria"})

	mock.ExpectQuery("SELECT").WillReturnRows(row)

	tests := []struct {
		name    string
		fields  fields
		args    args
		want    error
		wantErr bool
	}{
		{
			name: "GetUsers_NoDataFound",
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
			i := &userRepo{
				db: tt.fields.db,
			}
			_, err := i.GetUsersFromRepository(tt.args.ctx)

			if !reflect.DeepEqual(err, tt.want) {
				t.Errorf("GetUsersFromRepository() err = %v, want %v", err, tt.want)
			}
		})
	}
}

func Test_userRepo_GetUsersFromRepository_Failed(t *testing.T) {
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

	row := sqlmock.NewRows([]string{"id", "nombre", "email", "telefono", "password"}).AddRow(1, "jaime", "jaime@gmail.com", 25895214, "1458")

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
		want    []userControl2.UserRegistersResponse
		wantErr bool
	}{
		{
			name: "GetUsers_ScanError",
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
			name: "GetUsers_QueryError",
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
			i := &userRepo{
				db: tt.fields.db,
			}
			got, err := i.GetUsersFromRepository(tt.args.ctx)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetUsersFromRepository() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetUsersFromRepository() got = %v, want %v", got, tt.want)
			}
		})
	}
}
