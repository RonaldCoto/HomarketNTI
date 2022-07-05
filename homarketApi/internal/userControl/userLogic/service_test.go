package userLogic

import (
	"context"
	userControl2 "homarket/internal/userControl"
	"homarket/internal/userControl/platform/storage/mocks"
	"reflect"
	"testing"
)

func TestNewService(t *testing.T) {
	type args struct {
		repo userControl2.Repository
	}
	repoMock := mocks.NewUserRepoMock(false)
	tests := []struct {
		name string
		args args
		want *service
	}{
		{
			name: "TestNewServiceUserConstructor",
			args: args{
				repo: repoMock,
			},
			want: &service{
				repo: repoMock,
			},
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewService(tt.args.repo); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewService() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_service_GetUsersResponseService(t *testing.T) {
	type fields struct {
		repo userControl2.Repository
	}
	type args struct {
		ctx context.Context
	}

	repoMockSuccess := mocks.NewUserRepoMock(false)
	data := []userControl2.UserRegistersResponse{
		{
			Id:        1,
			Nombre:    "jaime",
			Email:     "jaime@gmail.com",
			Telefono:  25895214,
			Password:  "1458",
			Categoria: "A",
		},
		{
			Id:        2,
			Nombre:    "milena",
			Email:     "milena@gmail.com",
			Telefono:  74589632,
			Password:  "456",
			Categoria: "C",
		},
	}

	repoMockFail := mocks.NewUserRepoMock(true)

	tests := []struct {
		name    string
		fields  fields
		args    args
		want    []userControl2.UserRegistersResponse
		wantErr bool
	}{
		{
			name: "GetUserResponseService_Success",
			fields: fields{
				repo: repoMockSuccess,
			},
			args: args{
				ctx: context.Background(),
			},
			want:    data,
			wantErr: false,
		},
		{
			name: "GetUsersResponseService_Error",
			fields: fields{
				repo: repoMockFail,
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
			s := &service{
				repo: tt.fields.repo,
			}
			got, err := s.GetUsersResponseService(tt.args.ctx)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetUsersResponseService() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetUsersResponseService() got = %v, want %v", got, tt.want)
			}
		})
	}
}
