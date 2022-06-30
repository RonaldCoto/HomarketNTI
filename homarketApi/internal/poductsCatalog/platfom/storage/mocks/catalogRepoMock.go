package mocks

import (
	"context"
	"errors"
	"homarket/internal/poductsCatalog"
)

type catalogRepoMock struct {
	flag bool
}

func NewCatalogRepoMock(flag bool) *catalogRepoMock {
	return &catalogRepoMock{flag: flag}
}

func (c *catalogRepoMock) GetCatalogFromRepository(ctx context.Context, id int64) ([]poductsCatalog.CatalogResponse, error) {
	if c.flag == true {
		return nil, errors.New("Failed")
	}
	return []poductsCatalog.CatalogResponse{
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
