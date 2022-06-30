package inventoryControl

import "context"

type Service interface {
	GetInventoryResponseService(ctx context.Context) ([]InventoryRegistersResponse, error)
}

type Repository interface {
	GetInventoryFromRepository(ctx context.Context) ([]InventoryRegistersResponse, error)
}

type InventoryRegistersResponse struct {
	Id             int64   `json:"id"`
	Nombre         string  `json:"nombre"`
	Precio         float64 `json:"precio"`
	Existencia     int64   `json:"existencia"`
	Imagen         string  `json:"imagen"`
	IdCategoria    int64   `json:"id_categoria"`
	IdSubCategoria int64   `json:"id_subcategoria"`
}
