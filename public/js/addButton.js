var countClass = 1;

function addSubscribe() {

    var classContainer = document.getElementById('input-subscribe');

    var divElement = document.createElement('div');
    divElement.id = 'input' + countClass;
    divElement.setAttribute('class', 'row mb-2');

    var divCol1 = document.createElement('div');
    divCol1.setAttribute('class', 'col-5');

    var divCol2 = document.createElement('div');
    divCol2.setAttribute('class', 'col-5');

    var divCol3 = document.createElement('div');
    divCol3.setAttribute('class', 'col-2');

    var inputElement = document.createElement('input');
    inputElement.setAttribute('name', 'subscribe[]');
    inputElement.setAttribute('class', 'form-control');
    inputElement.setAttribute('type', 'text');
    divCol1.appendChild(inputElement);
    divElement.appendChild(divCol1);

    var inputPriceElement = document.createElement('input');
    inputPriceElement.setAttribute('name', 'subscribe_price[]');
    inputPriceElement.setAttribute('class', 'form-control');
    inputPriceElement.setAttribute('type', 'number');
    divCol2.appendChild(inputPriceElement);
    divElement.appendChild(divCol2);

    var deleteButton = document.createElement('button');
    deleteButton.textContent = 'Hapus';
    deleteButton.setAttribute('type', 'button');
    deleteButton.setAttribute('class', 'btn')
    deleteButton.setAttribute('onclick', 'removeInput(' + countClass + ')');
    divCol3.appendChild(deleteButton);
    divElement.appendChild(divCol3);


    classContainer.appendChild(divElement);

    countClass++;
}

var countSubscribe = 1;

function addClasses() {

    var classContainer = document.getElementById('input-classes');

    var divElement = document.createElement('div');
    divElement.id = 'input' + countSubscribe;
    divElement.setAttribute('class', 'row mb-2');

    var divCol1 = document.createElement('div');
    divCol1.setAttribute('class', 'col-5');

    var divCol2 = document.createElement('div');
    divCol2.setAttribute('class', 'col-5');

    var divCol3 = document.createElement('div');
    divCol3.setAttribute('class', 'col-2');

    var inputElement = document.createElement('input');
    inputElement.setAttribute('name', 'classes[]');
    inputElement.setAttribute('class', 'form-control');
    inputElement.setAttribute('type', 'text');
    divCol1.appendChild(inputElement);
    divElement.appendChild(divCol1);

    var inputPriceElement = document.createElement('input');
    inputPriceElement.setAttribute('name', 'class_price[]');
    inputPriceElement.setAttribute('class', 'form-control');
    inputPriceElement.setAttribute('type', 'number');
    divCol2.appendChild(inputPriceElement);
    divElement.appendChild(divCol2);

    var deleteButton = document.createElement('button');
    deleteButton.textContent = 'Hapus';
    deleteButton.setAttribute('type', 'button');
    deleteButton.setAttribute('class', 'btn')
    deleteButton.setAttribute('onclick', 'removeInput(' + countSubscribe + ')');
    divCol3.appendChild(deleteButton);
    divElement.appendChild(divCol3);


    classContainer.appendChild(divElement);

    countSubscribe++;
}

function removeInput(inputId) {
    var inputElement = document.getElementById('input' + inputId);
    inputElement.remove();
}