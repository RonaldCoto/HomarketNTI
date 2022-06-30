package mysql

import (
	"context"
	"database/sql"
	"homarket/internal/inventoryControl"
	"homarket/kit/constants"
	"log"
)

type inventoryCatalogRepo struct {
	db *sql.DB
}

func NewInventoryCatalogRepo(db *sql.DB) *inventoryCatalogRepo {
	return &inventoryCatalogRepo{db: db}
}

func (i *inventoryCatalogRepo) GetInventoryFromRepository(ctx context.Context) ([]inventoryControl.InventoryRegistersResponse, error) {
	sql := "SELECT * FROM productos"

	rows, err := i.db.QueryContext(ctx, sql)
	if err != nil {
		log.Println("Error while trying to get information from DB")
		return nil, err
	}

	defer rows.Close()
	var resp []inventoryControl.InventoryRegistersResponse

	for rows.Next() {
		var inventoryRows InventoryRegistersResponse
		if err := rows.Scan(&inventoryRows.Id, &inventoryRows.Nombre, &inventoryRows.Precio, &inventoryRows.Existencia, &inventoryRows.Imagen, &inventoryRows.IdCategoria, &inventoryRows.IdSubCategoria); err != nil {
			log.Println("Error while trying to scan query from db to internal struct")
			return nil, err
		}

		resp = append(resp, inventoryControl.InventoryRegistersResponse{
			Id:             inventoryRows.Id,
			Nombre:         inventoryRows.Nombre,
			Precio:         inventoryRows.Precio,
			Existencia:     inventoryRows.Existencia,
			Imagen:         inventoryRows.Imagen,
			IdCategoria:    inventoryRows.IdCategoria,
			IdSubCategoria: inventoryRows.IdSubCategoria,
		})
	}

	if len(resp) <= 0 {
		log.Println("No data to process")
		return nil, constants.ErrorNotDataFound
	}

	return resp, nil
}
