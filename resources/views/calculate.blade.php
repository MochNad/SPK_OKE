<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/x-icon">
    <title>Calculate</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style-darkmode.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="row m-0 p-3">
        <div class="col-12 col-md-3 p-0">
            <div class="card p-2 m-2 border-0 shadow">
                <h3 class="text-center">
                    Inisialisasi Matriks
                </h3>
                <form id="matrixForm">
                    <div class="form-group">
                        <input type="number" id="alternatif" class="form-control" placeholder="Alternatif"
                            onkeyup="generateMatrix()">
                    </div>
                    <div class="form-group">
                        <input type="number" id="kriteria" class="form-control" placeholder="Kriteria"
                            onkeyup="generateMatrix()">
                    </div>
                </form>
            </div>
            <div class="card p-2 m-2 border-0 shadow">
                <h3 class="text-center">
                    Metode
                </h3>
                <form id="methodForm">
                    <div class="form-group">
                        <select class="form-control" id="methodSelect" name="method">
                            <option value="Method1">Metode 1</option>
                            <option value="Method2">Metode 2</option>
                            <option value="Method3">Metode 3</option>
                        </select>
                    </div>
                </form>
                <button class="btn btn-primary" id="hitungButton" onclick="hitung()">Hitung</button>
            </div>
        </div>
        <div class="col-12 col-md-9 p-0">
            <div class="card p-2 m-2 border-0 shadow">
                <h3 class="text-center">
                    Matriks Berpasangan
                </h3>
                <div id="matriks-berpasangan">

                </div>
                <div id="weight">

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            generateMatrix();
            toggleHitungButton();
        });

        function checkMatrixFilled() {
            var inputs = document.querySelectorAll("input[type=number]");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    return false;
                }
            }
            return true;
        }

        function toggleHitungButton() {
            var selectedMethod = document.getElementById("methodSelect").value;
            var isMatrixFilled = checkMatrixFilled();
            var hitungButton = document.getElementById("hitungButton");

            if (selectedMethod === "" || !isMatrixFilled) {
                hitungButton.disabled = true;
            } else {
                hitungButton.disabled = false;
            }
        }

        function generateMatrix() {
            var alternatif = parseInt(document.getElementById("alternatif").value);
            var kriteria = parseInt(document.getElementById("kriteria").value);

            if (isNaN(alternatif) || isNaN(kriteria)) {
                document.getElementById("matriks-berpasangan").innerHTML =
                    '<div class="p-5"><h6 class="text-center font-italic">Isi Inisialisasi Matriks</h6></div>';
            } else {
                var table = '<table class="table table-sm table-borderless table-responsive">';
                table += '<thead><tr><th></th>';

                for (var i = 0; i < kriteria; i++) {
                    table += '<th class="text-center">C' + (i + 1) + '</th>';
                }

                table += '</tr></thead>';
                table += '<tbody>';

                for (var j = 0; j < alternatif; j++) {
                    table += '<tr><th class="text-center">A' + (j + 1) + '</th>';

                    for (var i = 0; i < kriteria; i++) {
                        table += '<td><input type="number" class="text-center form-control" id="A-' + (j + 1) + '_C-' + (i +
                            1) + '" style="width: 100px;" onkeyup="toggleHitungButton()"></td>';
                    }

                    table += '</tr>';
                }

                table += '</tbody>';
                table += '</table>';

                document.getElementById("matriks-berpasangan").innerHTML = table;
            }
        }
    </script>
</body>

</html>
