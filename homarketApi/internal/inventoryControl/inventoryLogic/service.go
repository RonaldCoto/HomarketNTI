package inventoryLogic

import (
	"context"
	"homarket/internal/inventoryControl"
	"log"
)

type service struct {
	repo inventoryControl.Repository
}

func NewService(repo inventoryControl.Repository) *service {
	return &service{repo: repo}
}

func (s *service) GetInventoryResponseService(ctx context.Context) ([]inventoryControl.InventoryRegistersResponse, error) {
	repoArray, err := s.repo.GetInventoryFromRepository(ctx)
	if err != nil {
		log.Println("Repository failed")
		return nil, err
	}

	return repoArray, nil
}
