package mocks

import (
	"context"
	"errors"
	"homarket/internal/inventoryControl"
)

type inventoryRepoMock struct {
	flag bool
}

func NewInventoryRepoMock(flag bool) *inventoryRepoMock {
	return &inventoryRepoMock{flag: flag}
}

func (i *inventoryRepoMock) GetInventoryFromRepository(ctx context.Context) ([]inventoryControl.InventoryRegistersResponse, error) {
	if i.flag == true {
		return nil, errors.New("Failed")
	}

	return []inventoryControl.InventoryRegistersResponse{
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
	}, nil
}
