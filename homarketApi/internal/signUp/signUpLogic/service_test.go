package signUpLogic

import (
	"context"
	"homarket/internal/signUp"
	"homarket/internal/signUp/platform/storage/mocks"
	"reflect"
	"testing"
)

func TestNewInsertService(t *testing.T) {
	type args struct {
		repo signUp.SaveRepository
	}

	repo := mocks.NewRepoMock()

	tests := []struct {
		name string
		args args
		want *insertService
	}{
		{
			name: "InsertService_Constructor",
			args: args{
				repo: repo,
			},
			want: &insertService{
				repo: repo,
			},
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewInsertService(tt.args.repo); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewInsertService() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_insertService_Process(t *testing.T) {
	type fields struct {
		repo signUp.SaveRepository
	}

	repo := mocks.NewRepoMock()

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
		want    *signUp.ServiceResponse
		wantErr bool
	}{
		{
			name: "insertService_Process_Success",
			fields: fields{
				repo: repo,
			},
			args: args{
				ctx:       context.Background(),
				nombre:    "michael",
				email:     "michael@gmial.com",
				telefono:  22548963,
				password:  "123",
				categoria: "C",
			},
			want: &signUp.ServiceResponse{
				Message: "success",
			},
			wantErr: false,
		},
		{
			name: "insertService_Process_Failed",
			fields: fields{
				repo: repo,
			},
			args: args{
				ctx:       context.Background(),
				nombre:    "michael",
				email:     "michael@gmial.com",
				telefono:  1,
				password:  "123",
				categoria: "C",
			},
			want:    nil,
			wantErr: true,
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			i := &insertService{
				repo: tt.fields.repo,
			}
			got, err := i.Process(tt.args.ctx, tt.args.nombre, tt.args.email, tt.args.telefono, tt.args.password, tt.args.categoria)
			if (err != nil) != tt.wantErr {
				t.Errorf("Process() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("Process() got = %v, want %v", got, tt.want)
			}
		})
	}
}
