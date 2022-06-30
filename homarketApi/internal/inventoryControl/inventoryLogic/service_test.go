package inventoryLogic

import (
	"context"
	"homarket/internal/inventoryControl"
	"homarket/internal/inventoryControl/platform/storage/mocks"
	"reflect"
	"testing"
)

func TestNewService(t *testing.T) {
	type args struct {
		repo inventoryControl.Repository
	}

	repoMock := mocks.NewInventoryRepoMock(false)
	tests := []struct {
		name string
		args args
		want *service
	}{
		{
			name: "TestNewServiceConstructor",
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

func Test_service_GetInventoryResponseService(t *testing.T) {
	type fields struct {
		repo inventoryControl.Repository
	}
	repoMockSuccess := mocks.NewInventoryRepoMock(false)
	data := []inventoryControl.InventoryRegistersResponse{
		{
			Id:             1,
			Nombre:         "Microondas",
			Precio:         50.99,
			Existencia:     2,
			Imagen:         "micro.jpg",
			IdCategoria:    1,
			IdSubCategoria: 1,
		},
		{
			Id:             2,
			Nombre:         "Pan",
			Precio:         0.99,
			Existencia:     25,
			Imagen:         "pan.jpg",
			IdCategoria:    2,
			IdSubCategoria: 1,
		},
	}
	repoMockFail := mocks.NewInventoryRepoMock(true)
	type args struct {
		ctx context.Context
	}
	tests := []struct {
		name    string
		fields  fields
		args    args
		want    []inventoryControl.InventoryRegistersResponse
		wantErr bool
	}{
		{
			name: "GetInventoryResponseService_Success",
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
			name: "GetInventoryResponseService_Error",
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
			got, err := s.GetInventoryResponseService(tt.args.ctx)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetInventoryResponseService() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetInventoryResponseService() got = %v, want %v", got, tt.want)
			}
		})
	}
}
