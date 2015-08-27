
    var map;
     var iHidePane;
     
    require([
        "dojo/keys",  
        "dojo/dom",
        "dojo/dom-construct",
        "dojo/on",
        "dojo/parser",
        "dojo/_base/array",
        
        
			  "esri/config",
        "esri/map",
        "esri/graphic",
        "esri/InfoTemplate",
        "esri/request",
        "esri/SnappingManager",
        "esri/sniff",
        "esri/urlUtils",
        "esri/arcgis/utils",

        
        "esri/dijit/Geocoder",
        "esri/dijit/Measurement",
        "esri/dijit/Legend",
        "esri/dijit/Popup",
        "esri/dijit/PopupTemplate",
        "esri/dijit/Scalebar",
        "esri/dijit/BasemapGallery",
        "esri/dijit/OverviewMap",
        "esri/dijit/Print",
        "esri/dijit/Search",
        
        
        

        "esri/geometry/webMercatorUtils",
        "esri/geometry/Point",
        "esri/geometry/scaleUtils", 

        "esri/layers/ArcGISTiledMapServiceLayer",
        "esri/layers/ArcGISDynamicMapServiceLayer",
        "esri/layers/ImageParameters",

        "esri/renderers/SimpleRenderer",

        "esri/tasks/IdentifyTask",
        "esri/tasks/IdentifyParameters",
        "esri/tasks/GeometryService",
        "esri/tasks/PrintTemplate",

        "esri/symbols/SimpleMarkerSymbol",
        "esri/symbols/SimpleLineSymbol",
        "esri/symbols/SimpleFillSymbol",
        "esri/symbols/PictureMarkerSymbol",


        

        "esri/toolbars/navigation",
      
        "esri/Color",
        "dojox/layout/ExpandoPane",
        "dijit/form/Button",
        "dijit/form/CheckBox", 
        
        "dijit/registry",
        "dijit/Toolbar",
        "dijit/Tooltip",
        "agsjs/TOC",
        "dijit/layout/BorderContainer",
        "dijit/layout/ContentPane",
         "dijit/TitlePane",


        
        
        "dojo/domReady!"

			 ], function(
         keys,dom,domConstruct,on,parser,arrayUtils,
         esriConfig,Map,Graphic,InfoTemplate,esriRequest,SnappingManager,has, urlUtils, utils,
        Geocoder,Measurement, Legend, Popup, PopupTemplate, Scalebar,BasemapGallery,OverviewMap,Print,Search,
        webMercatorUtils,Point,scaleUtils,
        ArcGISTiledMapServiceLayer,ArcGISDynamicMapServiceLayer, ImageParameters,
        SimpleRenderer, 
        IdentifyTask,IdentifyParameters,GeometryService,PrintTemplate,
        SimpleMarkerSymbol,SimpleLineSymbol,SimpleFillSymbol, PictureMarkerSymbol,
        Navigation, 
        Color, ExpandoPane,
       
        Button,CheckBox,
        registry,Toolbar,Tooltip, TOC
        
        ) {
        parser.parse();
          
         var sls = new SimpleLineSymbol("solid", new Color("#444444"), 3);
          var sfs = new SimpleFillSymbol("solid", sls, new Color([68, 68, 68, 0.25]));

          var popup = new Popup({
            fillSymbol: sfs,
            lineSymbol: null
          }, domConstruct.create("div"));
          popup.resize(535,450)
       
          
          var printUrl = "http://sampleserver6.arcgisonline.com/arcgis/rest/services/Utilities/PrintingTools/GPServer/Export%20Web%20Map%20Task";
        

				  map = new Map("map", {
     
					center: [116.5, 0.2],
					zoom: 8,
			          basemap : "satellite",
			          sliderPosition: "top-right",
			          sliderStyle: "large",
			          infoWindow: popup
				  });
           map.on("load", function() {
            map.disablePan();

          });

          //search
          var s = new Search({
            enableButtonMode: true, //this enables the search widget to display as a single button
            enableLabel: false,
            enableInfoWindow: true,
            showInfoWindowOnSelect: true,
            map: map
         }, "search");
         s.startup();

          
         
          var imageParameters = new ImageParameters();
          imageParameters.format = "jpeg";

          //print
          printer = new Print({
          map: map,
          url: "http://sampleserver6.arcgisonline.com/arcgis/rest/services/Utilities/PrintingTools/GPServer/Export%20Web%20Map%20Task"
          }, dom.byId("printButton"));
          printer.startup();


          //overview map
          var overviewMapDijit = new OverviewMap({
          map: map,
          visible: true
          },dojo.byId("overviewDiv"));
          overviewMapDijit.startup();

          on(dom.byId("closeom"), "click", closeover);
          function closeover() {
            overviewMapDijit.hide();
          }



          //      zoom
        var navToolbar;

        navToolbar = new Navigation(map);
          on(navToolbar, "onExtentHistoryChange", extentHistoryChangeHandler);

          registry.byId("zoomin").on("click", function () {
            navToolbar.activate(Navigation.ZOOM_IN);
      map.setMapCursor("url(../pukaltim/images/nav_zoomin.png),auto");
          });

          registry.byId("zoomout").on("click", function () {
            navToolbar.activate(Navigation.ZOOM_OUT);
      map.setMapCursor("url(../pukaltim/images/nav_zoomout.png),auto");
          });

          registry.byId("zoomfullext").on("click", function () {
            navToolbar.zoomToFullExtent();
          });

          registry.byId("zoomprev").on("click", function () {
            navToolbar.zoomToPrevExtent();
      map.setMapCursor("default");
          });

          registry.byId("zoomnext").on("click", function () {
            navToolbar.zoomToNextExtent();
      map.setMapCursor("default");
          });

          registry.byId("pan").on("click", function () {
            navToolbar.activate(Navigation.PAN);
      map.setMapCursor("url(../pukaltim/images/nav_pan.png),auto");
          });

          registry.byId("deactivate").on("click", function () {
            navToolbar.deactivate();
      map.setMapCursor("default");
          });
           

          function extentHistoryChangeHandler () {
            registry.byId("zoomprev").disabled = navToolbar.isFirstExtent();
            registry.byId("zoomnext").disabled = navToolbar.isLastExtent();
          }

         
          var scalebar = new Scalebar({
          map: map,
          scalebarUnit: "metric"
        });

          //Administrasi LAYER
				  var admin = new ArcGISDynamicMapServiceLayer("http://portal.ina-sdi.or.id/arcgis/rest/services/IGD/BatasAdministrasi_NKRI/MapServer",
          {
              "opacity" : 1,
            visible : true
            });
          var admin2 = new ArcGISTiledMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/geospasial/Administrasi/MapServer",
          {"opacity" : 1,
            visible : false
            });
         // var rbi = new ArcGISTiledMapServiceLayer(
         // "http://geoservices.big.go.id/arcgis/rest/services/RBI/Rupabumi/MapServer");  

          //layer tematik fisik
          var tematik = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/geospasial/Tematik_Fisik/MapServer",
          {
              "opacity" : 1,
            visible : false
            });

          //citra
          var citra = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/geospasial/Citra_Samboja/MapServer",
          {
              "opacity" : 1,
            visible : false
            });

          //Layer BHGK
          var bhgk = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/geospasial/PrasaranaSDA/MapServer", {
            "opacity" : 1,
          visible : false
          
            });
          

          // Layer Data Hidrologi
           var _poshidroInfoTemplate = new InfoTemplate();
              _poshidroInfoTemplate.setTitle("<b>Data Hidrologi</b>");
            var _poshidroInfoContent =
            "${*}";

            _poshidroInfoTemplate.setContent(
              _poshidroInfoContent);
           var poshidro = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/geospasial/Data_Hidrologi/MapServer",
          {
              "opacity" : 1,
            visible : false
            });
           poshidro.setInfoTemplates({
              1: { infoTemplate: _poshidroInfoTemplate },
              2: { infoTemplate: _poshidroInfoTemplate }
            });

           //Layer Neraca Air
           //popup debit
           var _debitInfoTemplate = new InfoTemplate();
              _debitInfoTemplate.setTitle("<b>Debit Aliran Per DAS</b>");
            var _debitInfoContent =
            "<div class=\"demographicInfoContent\">" +
            "Luas DAS: ${sda.DBO.FCHDTAXDASNEWAR.Luas} m<br>Debit Aliran: ${sda.dbo.v_debitaliran.TRO} mm/bln<br>Debit Aliran: ${sda.dbo.v_debitaliran.TROd} m3/dtk" +
            "</div>";

            _debitInfoTemplate.setContent("${sda.DBO.FCHDTAXDASNEWAR.NAMA}<br>" +
              _debitInfoContent);
           var debit = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/view/debitaliran/MapServer",
          {
              "opacity" : 1,
            visible : false
            });
           debit.setInfoTemplates({
              0: { infoTemplate: _debitInfoTemplate }
            });

           var _chdasInfoTemplate = new InfoTemplate();
              _chdasInfoTemplate.setTitle("<b>Curah Hujan Per DAS</b>");
            var _chdasInfoContent =
            "<div class=\"demographicInfoContent\">" +
            "Luas DAS: ${sda.DBO.FCHDTAXDASNEWAR.Luas} m<br>Curah Hujan: ${sda.dbo.v_curahhujanDAS.P } mm<br>Jumlah Hari Hujan: ${sda.dbo.v_curahhujanDAS.n } " +
            "</div>";

            _chdasInfoTemplate.setContent("${sda.DBO.FCHDTAXDASNEWAR.NAMA}<br>" +
              _chdasInfoContent);
           var chdas = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/view/curahhujan/MapServer",
          {
              "opacity" : 1,
            visible : false
            });
           chdas.setInfoTemplates({
              0: { infoTemplate: _chdasInfoTemplate }
            });

           //Banjir
           var _banjirInfoTemplate = new InfoTemplate();
              _banjirInfoTemplate.setTitle("<b>Informasi Banjir</b>");
            var _banjirInfoContent =
            "${*}";

            _banjirInfoTemplate.setContent(
              _banjirInfoContent);
            var banjir = new ArcGISDynamicMapServiceLayer("http://36.83.3.83:6080/arcgis/rest/services/geospasial/PeringatanDiniBanjir/MapServer",
          {
             "opacity" : 1,
            visible : false
            });
            banjir.setInfoTemplates({
              1: { infoTemplate: _banjirInfoTemplate },
              2: { infoTemplate: _banjirInfoTemplate },
              3: { infoTemplate: _banjirInfoTemplate },
              4: { infoTemplate: _banjirInfoTemplate },
              5: { infoTemplate: _banjirInfoTemplate },
              6: { infoTemplate: _banjirInfoTemplate },
              7: { infoTemplate: _banjirInfoTemplate }
            });

            var _antasariInfoTemplate = new InfoTemplate();
              _antasariInfoTemplate.setTitle("<b>Genangan Banjir</b>");

              var _antasariInfoContent = 
            "Nama Jalan = ${NamaJalan} <br> Kelurahan = ${Kelurahan} <br> Kecamatan = ${Kecamatan} <br> Kota/Kab = ${KotaKabupa} <br> Tahun = ${Tahun} "+
            "<br>Video 360 = <iframe src= 'http://localhost/video/${KodeUrl}.360scene/' width='500' height='480'></iframe>";
         
            _antasariInfoTemplate.setContent(
              _antasariInfoContent);
            var antasari = new ArcGISDynamicMapServiceLayer("http://localhost:6080/arcgis/rest/services/PUKALTIM2015/antasari/MapServer",
          {
             "opacity" : 1,
            visible : false
            });
            antasari.setInfoTemplates({
              0: { infoTemplate: _antasariInfoTemplate },
              1: { infoTemplate: _antasariInfoTemplate }
            });
          	

             var _sigisdaInfoTemplate = new InfoTemplate();
              _sigisdaInfoTemplate.setTitle("<b>Sumber Daya Air</b>");
            var _sigisdaInfoContent =
            "${*}";

            _sigisdaInfoTemplate.setContent(
              _sigisdaInfoContent);
           var sigisda = new ArcGISDynamicMapServiceLayer("http://sigi.pu.go.id/arcgis/rest/services/sigi_sda_id/MapServer", {
            "opacity" : 1,
            visible : false
            });
           sigisda.setInfoTemplates({
              1: { infoTemplate: _sigisdaInfoTemplate },
              2: { infoTemplate: _sigisdaInfoTemplate },
              3: { infoTemplate: _sigisdaInfoTemplate },
              4: { infoTemplate: _sigisdaInfoTemplate },
              5: { infoTemplate: _sigisdaInfoTemplate },
              6: { infoTemplate: _sigisdaInfoTemplate },
              7: { infoTemplate: _sigisdaInfoTemplate },
              8: { infoTemplate: _sigisdaInfoTemplate },
              9: { infoTemplate: _sigisdaInfoTemplate },
              10: { infoTemplate: _sigisdaInfoTemplate },
              11: { infoTemplate: _sigisdaInfoTemplate },
              12: { infoTemplate: _sigisdaInfoTemplate },
              13: { infoTemplate: _sigisdaInfoTemplate },
              14: { infoTemplate: _sigisdaInfoTemplate },
              15: { infoTemplate: _sigisdaInfoTemplate }
            });
          
           



          map.addLayers([admin,admin2,
                         citra,
                         tematik,
                         bhgk,
                         poshidro,
                         debit,chdas,
                         banjir,antasari,sigisda]);


			
          //SHow coordinates

          map.on("load", function() {
          //after map loads, connect to listen to mouse move & drag events
          map.on("mouse-move", showCoordinates);
          map.on("mouse-drag", showCoordinates);
            });

            function showCoordinates(evt) {
              //the map is in web mercator but display coordinates in geographic (lat, long)
              var mp = webMercatorUtils.webMercatorToGeographic(evt.mapPoint);

              
              //display mouse coordinates
              dom.byId("info").innerHTML = mp.x.toFixed(5) + ", " + mp.y.toFixed(5);
            }
          

           map.on("layers-add-result", function (evt) { 
            var layerInfo = arrayUtils.map(evt.layers, function (layer, index) {
              return {layer:layer.layer, title:layer.layer.name};
            });
            if (layerInfo.length > 0) {
              var legendDijit = new Legend({
                map: map,
                layerInfos: layerInfo
              }, "legendDiv");
              legendDijit.startup();
            }
           
          }); 

          //TOC
          map.on("layers-add-result", function (evt) {

          //TOC Administrasi
           var toc = new TOC({
                    map: map,
                    layerInfos: [{layer: admin,
                      title: "Administrasi RBI",
                      collapsed: true,
                      slider: true
                    },
                    {layer: admin2,
                      title: "Administrasi",
                      collapsed: true,
                      slider: true
                    }]
                  }, 'tocDiv');
                  toc.startup();
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                    
                    if (console) {
                       
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked );

                    if (evt.checked && evt.rootLayer && evt.serviceLayer){

                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }
                  }
                  });

            //TOC tematik fisik
            var toc2 = new TOC({
              map: map,
              layerInfos: [{
                layer: tematik,
                title: "Tematik Fisik",
                collapsed: true
              }]
            }, 'tocDiv2');
            toc2.startup();
               
            //2014-04-04: added event
            toc2.on('toc-node-checked', function(evt){
              if (console) {
              console.log("TOCNodeChecked, rootLayer:"
              +(evt.rootLayer?evt.rootLayer.id:'NULL')
              +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
              + " Checked:"+evt.checked);
              if (evt.checked && evt.rootLayer && evt.serviceLayer){
                // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
              }
            }
            });

           var toc3 = new TOC({
                    map: map,
                    layerInfos: [{
                      layer: bhgk,
                      title: "Prasarana SDA",
                      collapsed: true
                    }]
                  }, 'tocDiv3');
                  toc.startup();
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                    if (console) {
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked);
                    if (evt.checked && evt.rootLayer && evt.serviceLayer){
                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }
                  }
                  });   
          
                  //TOC Data Hidrologi
           var toc4 = new TOC({
                    map: map,
                    layerInfos: [{
                      layer: poshidro,
                      title: "Pos Hidrologi",
                      collapsed: true
                    }]
                  }, 'tocDiv4');
                  toc.startup();
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                    if (console) {
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked);
                    if (evt.checked && evt.rootLayer && evt.serviceLayer){
                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }
                  }
                  });
                  //TOC Neraca Air
           var toc5 = new TOC({
                    map: map,
                    layerInfos: [{
                      layer: chdas,
                      title: "Curah Hujan",
                      collapsed : true
                    },{
                      layer: debit,
                      title: "Debit Aliran",
                      collapsed : true
                    }]
                  }, 'tocDiv5');
                  toc.startup();
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                    if (console) {
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked);
                    if (evt.checked && evt.rootLayer && evt.serviceLayer){
                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }
                  }
                  
                });
                 //TOC CItra
           var toc6 = new TOC({
                    map: map,
                    layerInfos: [{
                      layer: citra,

                      title: "Citra Samboja 2012",
                      slider: true 
                    }]
                    
                  }, 'tocDiv6');
                  toc.startup();
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                    if (console) {
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked);
                    if (evt.checked && evt.rootLayer && evt.serviceLayer){
                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }
                  }
                  });

                   //TOC Banjir
           var toc7 = new TOC({
                    map: map,
                    layerInfos: [{
                      layer: banjir,
                      title: "Peringatan Dini Banjir",
                      collapsed: true,
                      slider: true

                    },
                    {layer: antasari,
                      title: "Genangan Banjir Jalan Antasari",
                      collapsed: true}]
                  }, 'tocDiv7');
                  toc.startup();
                 
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                   
                    if (console) {
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked);
                    if (evt.checked && evt.rootLayer && evt.serviceLayer){
                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }
                  }
                  });
                 
          //TOC SIGI
           var toc8 = new TOC({
                    map: map,
                    layerInfos: [{
                      layer: sigisda,
                      title: "Kementerian PU",
                      subtitle: "Bidang SDA",
                      collapsed: true
                    }
                    ]
                  }, 'tocDiv8');
                  toc.startup();
                     
                  //2014-04-04: added event
                  toc.on('toc-node-checked', function(evt){
                    if (console) {
                     
                    console.log("TOCNodeChecked, rootLayer:"
                    +(evt.rootLayer?evt.rootLayer.id:'NULL')
                    +", serviceLayer:"+(evt.serviceLayer?evt.serviceLayer.id:'NULL')
                    + " Checked:"+evt.checked);
                    if (evt.checked && evt.rootLayer && evt.serviceLayer){
                      // evt.rootLayer.setVisibleLayers([evt.serviceLayer.id])
                    }

                  }
                  });


          //add the basemap gallery, in this case we'll display maps from ArcGIS.com including bing maps
          var basemapGallery = new BasemapGallery({
            showArcGISBasemaps: true,
            map: map
          }, "basemapGallery");
          basemapGallery.startup();
          
          basemapGallery.on("error", function(msg) {
            console.log("basemap gallery error:  ", msg);
          });
    
                 
    });
        
        var symbol = new PictureMarkerSymbol({
                                           "angle": 0,
                          "xoffset": 0,
                          "yoffset": 12,
                          "type": "esriPMS",
                          "url": "http://static.arcgis.com/images/Symbols/Basic/YellowStickpin.png",
                          "contentType": "image/png",
                          "width": 24,
                          "height": 24
                });  
        
         on(dom.byId("go"), "click", coordinates);  
      
             function coordinates() {  
                console.log("got here")  
                 var lat = document.getElementById("sel_lat").value  
                 var long = document.getElementById("sel_long").value  
                 var mp = new Point(long, lat);  
                 var graphic = new Graphic(mp, symbol);  
                 map.graphics.add(graphic);
                map.centerAndZoom(mp,12);
             }  


          var snapManager = map.enableSnapping({
          snapKey: has("mac") ? keys.META : keys.CTRL
          });

          var layerInfos = [{layer:[admin,admin2,
                         citra,
                         tematik,
                         bhgk,
                         poshidro,
                         debit,chdas,
                         banjir]}];
          snapManager.setLayerInfos(layerInfos);


            var measurement = new Measurement({
              map: map

            }, "measurementDiv");
            measurement.startup();





          });
     
        