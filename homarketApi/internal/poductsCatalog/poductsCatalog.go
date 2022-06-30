package poductsCatalog

import "context"

type ServiceCatalog interface {
	GetCatalogResponseService(ctx context.Context, id int64) ([]CatalogResponse, error)
}

type RepositoryCatalog interface {
	GetCatalogFromRepository(ctx context.Context, id int64) ([]CatalogResponse, error)
}

type CatalogResponse struct {
	Id             int64   `json:"id"`
	Nombre         string  `json:"nombre"`
	Precio         float64 `json:"precio"`
	Existencia     int64   `json:"existencia"`
	Imagen         string  `json:"imagen"`
	IdCategoria    int64   `json:"id_categoria"`
	IdSubCategoria int64   `json:"id_subcategoria"`
}
