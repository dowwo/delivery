<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Agregar Pedido</title>
    <style type="text/css">
        body {
            background-color: #AB3E5B;
        }
        .autocomplete-container {
            margin-bottom: 20px;
        }

        .input-container {
            display: flex;
            position: relative;
        }

        .input-container input {
            flex: 1;
            outline: none;

            border: 1px solid rgba(0, 0, 0, 0.2);
            padding: 10px;
            padding-right: 31px;
            font-size: 16px;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0px 2px 10px 2px rgba(0, 0, 0, 0.1);
            border-top: none;
            background-color: #fff;

            z-index: 99;
            top: calc(100% + 2px);
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-items div:hover {
            /*when hovering an item:*/
            background-color: rgba(0, 0, 0, 0.1);
        }

        .autocomplete-items .autocomplete-active {
            /*when navigating through the items using the arrow keys:*/
            background-color: rgba(0, 0, 0, 0.1);
        }

        .clear-button {
            color: rgba(0, 0, 0, 0.4);
            cursor: pointer;

            position: absolute;
            right: 5px;
            top: 0;

            height: 100%;
            display: none;
            align-items: center;
        }

        .clear-button.visible {
            display: flex;
        }

        .clear-button:hover {
            color: rgba(0, 0, 0, 0.6);
        }
    </style>



</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido <?php echo $_SESSION['nombre'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboard1">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!--Botón para cerrar sesión, aplicable en cualquier parte-->
                <a class="btn btn-outline-danger my-2 my-sm-0" href="login/logout">Cerrar sesión</a>
            </form>
        </div>
    </nav>
</div>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['id_usuario'];
}
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">

            <h1>Agregar Pedido</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>

            <form action="/PedidoController/guardar" method="post">
                <div>
                    <label for="InputUsuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="InputUsuario" value="<?php echo $_SESSION['id_usuario'] ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForNombre" class="form-label">Tienda</label>
                    <input type="text" name="id_tienda" class="form-control" id="id_tienda" value="<?php
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    echo basename($actual_link);
                    ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForProducto" class="form-label">Producto</label>
                    <select name="producto" id="producto" class="form-select" aria-label="Default select example">
                        <?php
                        foreach($productos as $producto)
                        {
                            ?>
                            <option value="<?=$producto['id_producto']?>"><?=$producto['nombre']?>, Valor= <?=$producto['valor']?>, Stock= <?=$producto['cantidad']?> </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="InputForCantidad" class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" id="InputForCantidad">
                </div>
                <div class="mb-3">
                    <label for="InputForDireccion" class="form-label">Dirección destino</label>
                    <input type="text" name="direccion" class="form-control" id="InputForDireccion">
                </div>
                <!-- No lo recordaba pero tenia comentado los campos latitud y longitud para utilizarlos luego xd -->
                <div>
                    <label for="InputForLatitud" class="form-label">Latitud</label>
                    <input id="autocomplete" placeholder="Enter a place" type="text">
                    <input type="text" name="latitud" class="form-control" id="InputForLatitud">
                    <label for="InputForLongitud" class="form-label">Longitud</label>
                    <input type="text" name="longitud" class="form-control" id="InputForLongitud">
                </div>
                <div class="mb-3">
                    <label for="InputForFecha" class="form-label" name="fecha_pedido">Fecha pedido: <?php echo @date('d-m-Y'); ?></label>
                    <input type="text" class="form-control" id="InputForFecha" value="<?php echo @date('d-m-Y'); ?>" disabled="true" >
                </div>
                <div class="mb-3">
                    <label for="InputForTotal" class="form-label">Valor total</label>
                    <input type="number" name="total" class="form-control" id="InputForTotal">
                </div>
                <div class="mb-3">
                    <label for="InputForTienda" class="form-label">Estado</label>
                    <select name="estado" id="InputForTienda" class="form-select" aria-label="Default select example">
                        <option value="1">En espera</option>
                        <option value="2">En reparto</option>
                        <option value="3">Entregado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Registrar pedido</button>
            </form>
        </div>
    </div>
</div>

<!-- Popper.js first, then Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script>
    let autocomplete;
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'),
            {
                types: ['establishment'],
                componentRestrictions: {'country': ['CL']},
                fields: ['place_id', 'geometry','name']
            });

        autocomplete.addListener('place_changed', onPlaceChanged);
    }

    function onPlaceChanged() {
        var place = autocomplete.getPlace();

        if (!place.geometry) {
            // User did not select a prediction; reset the input field
            document.getElementById('autocomplete').placeholder = 'Enter a place';
        }else{
            // Display details about eht valid place
            document.getElementById('details').innerHTML = place.name;
        }

    }
</script>
<!--Este script es para utilizar el autocompletado y validacion de direcciones de google maps-->
<script src="https://maps.googleapis.com/maps/api/js?
        key=AIzaSyBp3qUeUUevPEBWY1v-3dJJs8yEgtNrP7I&libraries=places&callback=initAutocomplete" async defer>

</script>
<script>
    function addressAutocomplete(containerElement, callback, options) {

        const MIN_ADDRESS_LENGTH = 3;
        const DEBOUNCE_DELAY = 300;

        // create container for input element
        const inputContainerElement = document.createElement("div");
        inputContainerElement.setAttribute("class", "input-container");
        containerElement.appendChild(inputContainerElement);

        // create input element
        const inputElement = document.createElement("input");
        inputElement.setAttribute("type", "text");
        inputElement.setAttribute("placeholder", options.placeholder);
        inputContainerElement.appendChild(inputElement);

        // add input field clear button
        const clearButton = document.createElement("div");
        clearButton.classList.add("clear-button");
        addIcon(clearButton);
        clearButton.addEventListener("click", (e) => {
            e.stopPropagation();
            inputElement.value = '';
            callback(null);
            clearButton.classList.remove("visible");
            closeDropDownList();
        });
        inputContainerElement.appendChild(clearButton);

        /* We will call the API with a timeout to prevent unneccessary API activity.*/
        let currentTimeout;

        /* Save the current request promise reject function. To be able to cancel the promise when a new request comes */
        let currentPromiseReject;

        /* Focused item in the autocomplete list. This variable is used to navigate with buttons */
        let focusedItemIndex;

        /* Process a user input: */
        inputElement.addEventListener("input", function(e) {
            const currentValue = this.value;

            /* Close any already open dropdown list */
            closeDropDownList();


            // Cancel previous timeout
            if (currentTimeout) {
                clearTimeout(currentTimeout);
            }

            // Cancel previous request promise
            if (currentPromiseReject) {
                currentPromiseReject({
                    canceled: true
                });
            }

            if (!currentValue) {
                clearButton.classList.remove("visible");
            }

            // Show clearButton when there is a text
            clearButton.classList.add("visible");

            // Skip empty or short address strings
            if (!currentValue || currentValue.length < MIN_ADDRESS_LENGTH) {
                return false;
            }

            /* Call the Address Autocomplete API with a delay */
            currentTimeout = setTimeout(() => {
                currentTimeout = null;

                /* Create a new promise and send geocoding request */
                const promise = new Promise((resolve, reject) => {
                    currentPromiseReject = reject;

                    // The API Key provided is restricted to JSFiddle website
                    // Get your own API Key on https://myprojects.geoapify.com
                    const apiKey = "45feecb44f3e4a119606f218c0eb91ac";


                    var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&format=json&limit=5&apiKey=${apiKey}`;

                    fetch(url)
                        .then(response => {
                            currentPromiseReject = null;

                            // check if the call was successful
                            if (response.ok) {
                                response.json().then(data => resolve(data));
                            } else {
                                response.json().then(data => reject(data));
                            }
                        });
                });

                promise.then((data) => {
                    // here we get address suggestions
                    currentItems = data.results;

                    /*create a DIV element that will contain the items (values):*/
                    const autocompleteItemsElement = document.createElement("div");
                    autocompleteItemsElement.setAttribute("class", "autocomplete-items");
                    inputContainerElement.appendChild(autocompleteItemsElement);

                    /* For each item in the results */
                    data.results.forEach((result, index) => {
                        /* Create a DIV element for each element: */
                        const itemElement = document.createElement("div");
                        /* Set formatted address as item value */
                        itemElement.innerHTML = result.formatted;
                        autocompleteItemsElement.appendChild(itemElement);

                        /* Set the value for the autocomplete text field and notify: */
                        itemElement.addEventListener("click", function(e) {
                            inputElement.value = currentItems[index].formatted;
                            callback(currentItems[index]);
                            /* Close the list of autocompleted values: */
                            closeDropDownList();
                        });
                    });

                }, (err) => {
                    if (!err.canceled) {
                        console.log(err);
                    }
                });
            }, DEBOUNCE_DELAY);
        });

        /* Add support for keyboard navigation */
        inputElement.addEventListener("keydown", function(e) {
            var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
            if (autocompleteItemsElement) {
                var itemElements = autocompleteItemsElement.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    e.preventDefault();
                    /*If the arrow DOWN key is pressed, increase the focusedItemIndex variable:*/
                    focusedItemIndex = focusedItemIndex !== itemElements.length - 1 ? focusedItemIndex + 1 : 0;
                    /*and and make the current item more visible:*/
                    setActive(itemElements, focusedItemIndex);
                } else if (e.keyCode == 38) {
                    e.preventDefault();

                    /*If the arrow UP key is pressed, decrease the focusedItemIndex variable:*/
                    focusedItemIndex = focusedItemIndex !== 0 ? focusedItemIndex - 1 : focusedItemIndex = (itemElements.length - 1);
                    /*and and make the current item more visible:*/
                    setActive(itemElements, focusedItemIndex);
                } else if (e.keyCode == 13) {
                    /* If the ENTER key is pressed and value as selected, close the list*/
                    e.preventDefault();
                    if (focusedItemIndex > -1) {
                        closeDropDownList();
                    }
                }
            } else {
                if (e.keyCode == 40) {
                    /* Open dropdown list again */
                    var event = document.createEvent('Event');
                    event.initEvent('input', true, true);
                    inputElement.dispatchEvent(event);
                }
            }
        });

        function setActive(items, index) {
            if (!items || !items.length) return false;

            for (var i = 0; i < items.length; i++) {
                items[i].classList.remove("autocomplete-active");
            }

            /* Add class "autocomplete-active" to the active element*/
            items[index].classList.add("autocomplete-active");

            // Change input value and notify
            inputElement.value = currentItems[index].formatted;
            callback(currentItems[index]);
        }

        function closeDropDownList() {
            const autocompleteItemsElement = inputContainerElement.querySelector(".autocomplete-items");
            if (autocompleteItemsElement) {
                inputContainerElement.removeChild(autocompleteItemsElement);
            }

            focusedItemIndex = -1;
        }

        function addIcon(buttonElement) {
            const svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
            svgElement.setAttribute('viewBox', "0 0 24 24");
            svgElement.setAttribute('height', "24");

            const iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
            iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
            iconElement.setAttribute('fill', 'currentColor');
            svgElement.appendChild(iconElement);
            buttonElement.appendChild(svgElement);
        }

        /* Close the autocomplete dropdown when the document is clicked.
          Skip, when a user clicks on the input field */
        document.addEventListener("click", function(e) {
            if (e.target !== inputElement) {
                closeDropDownList();
            } else if (!containerElement.querySelector(".autocomplete-items")) {
                // open dropdown list again
                var event = document.createEvent('Event');
                event.initEvent('input', true, true);
                inputElement.dispatchEvent(event);
            }
        });
    }

    addressAutocomplete(document.getElementById("autocomplete-container"), (data) => {
        console.log("Selected option: ");
        console.log(data);
    }, {
        placeholder: "Enter an address here"
    });

</script>
</body>
</html>