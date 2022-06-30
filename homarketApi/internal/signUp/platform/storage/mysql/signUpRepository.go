package mysql

import (
	"context"
	"database/sql"
	"log"
)

type repo struct {
	db *sql.DB
}

func NewRepo(db *sql.DB) *repo {
	return &repo{db: db}
}

func (r *repo) Save(ctx context.Context, nombre string, email string, telefono int64, password string, categoria string) error {
	_, err := r.db.Query("INSERT INTO user(nombre, email, telefono, password, categoria) VALUES (?,?,?,?,?)", nombre, email, telefono, password, categoria)
	if err != nil {
		log.Print("something bad with the query")
		return err
	}
	return nil
}
