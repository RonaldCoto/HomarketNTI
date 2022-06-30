package mysql

import (
	"context"
	"database/sql"
	"github.com/DATA-DOG/go-sqlmock"
	"log"
	"reflect"
	"testing"
)

func TestNewRepo(t *testing.T) {
	type args struct {
		db *sql.DB
	}

	db, _, err := sqlmock.New()
	if err != nil {
		log.Print("error in stub database connection")
	}

	defer db.Close()

	tests := []struct {
		name string
		args args
		want *repo
	}{
		{
			name: "TestNewRepo_Constructor",
			args: args{
				db: db,
			},
			want: &repo{
				db: db,
			},
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewRepo(tt.args.db); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewRepo() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_repo_Save(t *testing.T) {
	type fields struct {
		db *sql.DB
	}

	db, mock, err := sqlmock.New()
	if err != nil {
		log.Print("error in stub database connection")
	}

	defer db.Close()
	query := "INSERT INTO user \\(nombre, email, telefono, password, categoria)\\) VALUES \\(\\?, \\?, \\?, \\?, \\?\\)"
	prep := mock.ExpectPrepare(query)
	prep.ExpectExec().WithArgs("michael", "michael@gmail.com", 22925412, "1234", "C").WillReturnResult(sqlmock.NewResult(0, 1))

	ctx := context.Background()

	type args struct {
		ctx       context.Context
		nombre    string
		email     string
		telefono  int64
		password  string
		categoria string
	}
	tests := []struct {
		name    string
		fields  fields
		args    args
		wantErr bool
	}{
		{
			name: "repo_Save_Failed",
			fields: fields{
				db: db,
			},
			args: args{
				ctx:       ctx,
				nombre:    "michael",
				email:     "michael@gmail.com",
				telefono:  22925412,
				password:  "1234",
				categoria: "C",
			},
			wantErr: true,
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			r := &repo{
				db: tt.fields.db,
			}
			if err := r.Save(tt.args.ctx, tt.args.nombre, tt.args.email, tt.args.telefono, tt.args.password, tt.args.categoria); (err != nil) != tt.wantErr {
				t.Errorf("Save() error = %v, wantErr %v", err, tt.wantErr)
			}
		})
	}
}
