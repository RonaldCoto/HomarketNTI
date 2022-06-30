package poductsCatalogLogic

import (
	"context"
	"homarket/internal/poductsCatalog"
	"homarket/internal/poductsCatalog/platfom/storage/mocks"
	"reflect"
	"testing"
)

func TestNewServiceCatalog(t *testing.T) {
	type args struct {
		repo poductsCatalog.RepositoryCatalog
	}

	repoMock := mocks.NewCatalogRepoMock(false)
	tests := []struct {
		name string
		args args
		want *serviceCatalog
	}{
		{
			name: "TestNewServiceCatalog_Constructor",
			args: args{
				repo: repoMock,
			},
			want: &serviceCatalog{
				repo: repoMock,
			},
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := NewServiceCatalog(tt.args.repo); !reflect.DeepEqual(got, tt.want) {
				t.Errorf("NewServiceCatalog() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_serviceCatalog_GetCatalogResponseService(t *testing.T) {
	type fields struct {
		repo poductsCatalog.RepositoryCatalog
	}
	type args struct {
		ctx context.Context
		id  int64
	}
	repoMock := mocks.NewCatalogRepoMock(false)
	data := []poductsCatalog.CatalogResponse{
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

	repoMockFail := mocks.NewCatalogRepoMock(true)
	tests := []struct {
		name    string
		fields  fields
		args    args
		want    []poductsCatalog.CatalogResponse
		wantErr bool
	}{
		{
			name: "GetCatalogResponseService_Success",
			fields: fields{
				repo: repoMock,
			},
			args: args{
				ctx: context.Background(),
			},
			want:    data,
			wantErr: false,
		},
		{
			name: "GetCatalogResponseService_Error",
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
			s := &serviceCatalog{
				repo: tt.fields.repo,
			}
			got, err := s.GetCatalogResponseService(tt.args.ctx, tt.args.id)
			if (err != nil) != tt.wantErr {
				t.Errorf("GetCatalogResponseService() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("GetCatalogResponseService() got = %v, want %v", got, tt.want)
			}
		})
	}
}
