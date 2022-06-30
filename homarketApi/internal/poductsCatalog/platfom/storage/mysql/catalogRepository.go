package mysql

import (
	"context"
	"database/sql"
	"homarket/internal/poductsCatalog"
	"homarket/kit/constants"
	"log"
)

type productsCatalogRepo struct {
	db *sql.DB
}

func NewProductsCatalogRepo(db *sql.DB) *productsCatalogRepo {
	return &productsCatalogRepo{db: db}
}

func (p *productsCatalogRepo) GetCatalogFromRepository(ctx context.Context, id int64) ([]poductsCatalog.CatalogResponse, error) {

	rows, err := p.db.QueryContext(ctx, "SELECT * FROM productos WHERE id_subcategoria=? and existencia>0", id)
	if err != nil {
		log.Println("Error while trying to get information from DB")
		return nil, err
	}

	defer rows.Close()
	var resp []poductsCatalog.CatalogResponse

	for rows.Next() {
		var poductsRows CatalogRegistersResponse
		if err := rows.Scan(&poductsRows.Id, &poductsRows.Nombre, &poductsRows.Precio, &poductsRows.Existencia, &poductsRows.Imagen, &poductsRows.IdCategoria, &poductsRows.IdSubCategoria); err != nil {
			log.Println("Error while trying to scan query from db to internal struct")
			return nil, err
		}

		resp = append(resp, poductsCatalog.CatalogResponse{
			Id:             poductsRows.Id,
			Nombre:         poductsRows.Nombre,
			Precio:         poductsRows.Precio,
			Existencia:     poductsRows.Existencia,
			Imagen:         poductsRows.Imagen,
			IdCategoria:    poductsRows.IdCategoria,
			IdSubCategoria: poductsRows.IdSubCategoria,
		})
	}

	if len(resp) <= 0 {
		log.Println("No data to process")
		return nil, constants.ErrorNotDataFound
	}

	return resp, nil
}
