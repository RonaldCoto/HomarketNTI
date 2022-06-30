package poductsCatalogLogic

import (
	"context"
	"homarket/internal/poductsCatalog"
	"log"
)

type serviceCatalog struct {
	repo poductsCatalog.RepositoryCatalog
}

func NewServiceCatalog(repo poductsCatalog.RepositoryCatalog) *serviceCatalog {
	return &serviceCatalog{repo: repo}
}

func (s *serviceCatalog) GetCatalogResponseService(ctx context.Context, id int64) ([]poductsCatalog.CatalogResponse, error) {
	repoArray, err := s.repo.GetCatalogFromRepository(ctx, id)

	if err != nil {
		log.Println("Repository failed")
		return nil, err
	}

	return repoArray, nil
}
