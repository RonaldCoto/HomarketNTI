package cmd

import (
	"database/sql"
	"fmt"
	"github.com/go-kit/kit/endpoint"
	kitlog "github.com/go-kit/kit/log"
	_ "github.com/go-sql-driver/mysql"
	"homarket/internal/inventoryControl/inventoryLogic"
	platform2 "homarket/internal/inventoryControl/platform"
	"homarket/internal/inventoryControl/platform/storage/mysql"
	"homarket/internal/poductsCatalog/platfom"
	mysql3 "homarket/internal/poductsCatalog/platfom/storage/mysql"
	"homarket/internal/poductsCatalog/poductsCatalogLogic"
	platform3 "homarket/internal/signUp/platform"
	mysql2 "homarket/internal/signUp/platform/storage/mysql"
	"homarket/internal/signUp/signUpLogic"
	platform4 "homarket/internal/userControl/platform"
	mysql4 "homarket/internal/userControl/platform/storage/mysql"
	"homarket/internal/userControl/userLogic"
	"homarket/kit/platform"
	"log"
	"os"
)

func Run() {
	var kitlogger kitlog.Logger
	kitlogger = kitlog.NewJSONLogger(os.Stderr)
	kitlogger = kitlog.With(kitlogger, "time", kitlog.DefaultTimestamp)
	strConnection := getStrConnection()
	db, err := sql.Open("mysql", strConnection)

	if err != nil {
		log.Print("error in connection %s ", err.Error())
	}

	/*INVENTORY*/
	repo := mysql.NewInventoryCatalogRepo(db)
	serv := inventoryLogic.NewService(repo)
	var gettingInventory endpoint.Endpoint
	gettingInventory = platform2.MakeGetPayResponseEndpoint(serv)
	getHandler := platform2.NewHttpGetInventoryResponseHandler("/v1/catalog/inventory", gettingInventory)
	/*END INVENTORY*/

	/*SIGNUP*/
	sigupRepo := mysql2.NewRepo(db)
	signUpService := signUpLogic.NewInsertService(sigupRepo)
	settingUser := platform3.MakeSetUserEndpoint(signUpService)
	setHandler := platform3.NewHttpCaseHandler("/v1/user/signup", settingUser)
	/*END SIGNUP*/

	/*CATALOG*/
	catalogRepo := mysql3.NewProductsCatalogRepo(db)
	catalogService := poductsCatalogLogic.NewServiceCatalog(catalogRepo)
	gettingCatalog := platfom.MakeGetCatalogResponseEndpoint(catalogService)
	getCatalogHandler := platfom.NewHttpGetProductsResponseHandler("/v1/catalog/products", gettingCatalog)
	/*END CATALOG*/

	/*USERS*/
	repoUser := mysql4.NewUserRepo(db)
	servUser := userLogic.NewService(repoUser)
	gettingUsers := platform4.MakeGetUserResponseEndpoint(servUser)
	getHandlerUser := platform4.NewHttpGetUserResponseHandler("/v1/users/management", gettingUsers)
	/*END USERS*/

	svc := platform.NewServer(kitlogger)
	svc.RegisterRoutes("/v1/catalog/inventory", getHandler)
	svc.RegisterRoutes("/v1/user/signup", setHandler)
	svc.RegisterRoutes("/v1/catalog/products", getCatalogHandler)
	svc.RegisterRoutes("/v1/users/management", getHandlerUser)
	svc.Run("90")
}

func getStrConnection() string {
	host := "localhost:3306"
	user := "root"
	pass := ""
	dbname := "bdd"
	strconn := fmt.Sprintf("%s:%s@tcp(%s)/%s?parseTime=True", user, pass, host, dbname)
	return strconn
}
