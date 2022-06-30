package platfom

import (
	"context"
	"encoding/json"
	"github.com/go-kit/kit/endpoint"
	httptransport "github.com/go-kit/kit/transport/http"
	"github.com/gorilla/mux"
	"homarket/kit/constants"
	"net/http"
	"strconv"
)

func NewHttpGetProductsResponseHandler(path string, endpoints endpoint.Endpoint) http.Handler {
	r := mux.NewRouter()
	r.Handle(path,
		httptransport.NewServer(endpoints,
			DecodeRequest,
			EncodeResponse,
		)).Methods(http.MethodGet)
	return r
}

//DecodeRequest ...
func DecodeRequest(ctx context.Context, r *http.Request) (interface{}, error) {
	var catalogRequest GetProductsRequest
	ctx = context.Background()
	catalogRequest.ctx = ctx
	idSub, _ := strconv.ParseInt(r.Header.Get("idSubCategoria"), 10, 64)
	catalogRequest.id = idSub
	return catalogRequest, nil
}

func EncodeResponse(ctx context.Context, w http.ResponseWriter, response interface{}) error {
	w.Header().Set("Content-Type", "application/json; charset=utf-8")
	resp, _ := response.(getCatalogInternalResponse)
	if resp.Err != nil {

		w.Header().Set("Content-Type", "application/json; charset=utf-8")
		switch resp.Err {
		case constants.ErrorNotDataFound:
			w.WriteHeader(http.StatusNoContent)
			break
		default:
			w.WriteHeader(http.StatusInternalServerError)
		}
		return json.NewEncoder(w).Encode(resp.Err.Error())
	}
	return json.NewEncoder(w).Encode(resp.Response)
}
