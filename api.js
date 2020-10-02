'use strict'


window.addEventListener('load', () => {
    let block = false;
    let page = 0;
    let offet = 0;
    cargarProductos(164);

    //divc.style.display = "block";
    var divc = document.getElementById('cargando');
    window.addEventListener('scroll', function (e) {
        var scrollheight = window.scrollY + 500;
        var viewportheight = document.documentElement.clientHeight;
        var leng = document.getElementById('table_cat_body').childNodes.length
        var moreScroll = document.getElementById('table_cat_body').childNodes[leng - 1].offsetTop;

        if ((scrollheight >= moreScroll) && block === false) {
            block = true;
            window.addEventListener('scroll', ()=>{
                var x = window.scrollX;
                var y = window.scrollY;
                window.onscroll = function(){
                   
                     window.scrollTo(x, y) };
            })
            cargarProductos(164);
            //divc.style.display = "block"; 
            /*  window.setTimeout(()=>{
                  divc.style.display = "none";
                  cargarProductos()
                  block = false;
              },2000)*/
        }

    });

  
    function cargarProductos(idcat) {
        var productos = [];
        var divc = document.getElementById('cargando');
        divc.style.display = "block";
        
        console.log(`http://localhost/apiphp-2/api.php?idcat=164&offset=0&limit=40`)
       
        
        fetch(`http://localhost/apiphp-2/api.php?idcat=164&offset=0&limit=40`)
            .then(data => {
                if (data.ok) {
                    return data.json()
                } else {
                    throw "Respuesta incorrecta del servidor"
                }
            })
            .then(data => {
                productos = data;
                offet = offet + 40
                console.log(offet);
               // window.addEventListener('scroll', enableScroll);
                llenarTabla(productos.items)
                console.log(productos.items);
                divc.style.display = "none";
                block = false
            })
            .catch(err => {
                console.log(err);
            })
    }

    function llenarTabla(productos) {

        var tabtable = document.getElementById('table_cat');
        var tbody = document.getElementById("table_cat_body");
        // console.log(productos);
        for (const pro in productos) {
            if (productos.hasOwnProperty(pro)) {

                var tr = document.createElement("tr");
                var td = document.createElement("td");
                var div = document.createElement("div");
                var a = document.createElement("a");
                var at = document.createElement("a");
                var at2 = document.createElement("a");
                var at3 = document.createElement("a");
                var img = document.createElement("img");

                var td2 = document.createElement("td");
                var td3 = document.createElement("td");

                var h3td = document.createElement("h3");
                h3td.classList.add("itemTitle");

                var div2 = document.createElement("div");
                div2.style.width = '90px';
                div2.style.height = '19px';

                var div3 = document.createElement("div");
                div3.classList.add("productbtn");
                div3.style.marginTop = "-33px";

                var div4 = document.createElement("div");
                div4.classList.add("mj-productdetailimage");



                at3.href = `https://www.mobelhispania.com/index.php?main_page=ask_a_question&products_id=${productos[pro].id_product}`;
                at3.innerText = "Escribenos";

                var span = document.createElement('span');
                span.classList.add('productSpecialPrice');



                img.src = "https://www.mobelhispania.com/bmz_cache/1/1e5d77bd641bbb0c3fc0676a6ffccfc5.image.126x120.jpg";
                img.alt = "AG.6360 Sillon aluminio gris Asiento en cuerda taupe";
                img.title = " AG.6360 Sillon aluminio gris Asiento en cuerda taupe ";
                img.style.height = '120';
                img.classList.add("listingProductImage");

                a.href = `https://www.mobelhispania.com/index.php?main_page=product_info&cPath=163_164&products_id=${productos[pro].id_product}`;
                a.innerText = "+ detalles";
                at.href = `https://www.mobelhispania.com/index.php?main_page=product_info&cPath=163_164&products_id=${productos[pro].id_product}`;
                at2.href = `https://www.mobelhispania.com/index.php?main_page=product_info&cPath=163_164&products_id=${productos[pro].id_product}`;


                td.classList.add("productListing-data");
                td2.classList.add("productListing-data");
                td3.classList.add("productListing-data");
                td3.style.textAlign = 'center';

                tr.classList.add("productListing-odd");
                tr.style.width = "31%"
                td.style.minHeight = '175px';
                td.setAttribute("aling","center");
                div.style.textAlign = 'right';
                var br1 = document.createElement('br');
                var br2 = document.createElement('br');
                var br3 = document.createElement('br');

                //var td = `<td class="productListing-data" style="min-height:175px;" align="center">   </td>`;

                span.innerText = productos[pro].final_price + "EURO";
                at2.innerText = productos[pro].name_product;
                div.appendChild(a);
                div2.appendChild(span);
                
                div3.appendChild(div4);
                div4.appendChild(at3);
                td.appendChild(div);
                at.innerHTML = productos[pro].imagen_product;
                td.appendChild(at);
                h3td.appendChild(at2)
                td2.appendChild(h3td);
                td3.appendChild(div2);
                td3.appendChild(br1);
                td3.appendChild(div3);
                td3.appendChild(br2);
                td3.appendChild(br3);
                tr.appendChild(td);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tbody.appendChild(tr);
                //console.log(productos[pro].imagen_product);

            }
        }

    }
})

