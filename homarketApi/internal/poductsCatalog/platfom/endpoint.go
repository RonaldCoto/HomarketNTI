package platfom

import (
	"context"
	"github.com/go-kit/kit/endpoint"
	"homarket/internal/poductsCatalog"
)

func MakeGetCatalogResponseEndpoint(s poductsCatalog.ServiceCatalog) endpoint.Endpoint {
	return func(ctx context.Context, request interface{}) (interface{}, error) {
		req := request.(GetProductsRequest)
		resp, err := s.GetCatalogResponseService(req.ctx, req.id)
		return getCatalogInternalResponse{
			Response: resp,
			Err:      err,
		}, nil
	}
}

type GetProductsRequest struct {
	ctx context.Context
	id  int64 `json:"id"`
}

type getCatalogInternalResponse struct {
	Response interface{}
	Err      error
}
