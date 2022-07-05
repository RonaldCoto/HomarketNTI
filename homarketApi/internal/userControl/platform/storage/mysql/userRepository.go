package mysql

import (
	"context"
	"database/sql"
	userControl2 "homarket/internal/userControl"
	"homarket/kit/constants"
	"log"
)

type userRepo struct {
	db *sql.DB
}

func NewUserRepo(db *sql.DB) *userRepo {
	return &userRepo{db: db}
}

func (i *userRepo) GetUsersFromRepository(ctx context.Context) ([]userControl2.UserRegistersResponse, error) {
	sql := "SELECT * FROM user"

	rows, err := i.db.QueryContext(ctx, sql)
	if err != nil {
		log.Println("Error while trying to get information from DB")
		return nil, err
	}

	defer rows.Close()
	var resp []userControl2.UserRegistersResponse

	for rows.Next() {
		var userRows UserRegistersResponse
		if err := rows.Scan(&userRows.Id, &userRows.Nombre, &userRows.Email, &userRows.Telefono, &userRows.Password, &userRows.Categoria); err != nil {
			log.Println("Error while trying to scan query from db to internal struct")
			return nil, err
		}

		resp = append(resp, userControl2.UserRegistersResponse{
			Id:        userRows.Id,
			Nombre:    userRows.Nombre,
			Email:     userRows.Email,
			Telefono:  userRows.Telefono,
			Password:  userRows.Password,
			Categoria: userRows.Categoria,
		})
	}

	if len(resp) <= 0 {
		log.Println("No data to process")
		return nil, constants.ErrorNotDataFound
	}

	return resp, nil
}
