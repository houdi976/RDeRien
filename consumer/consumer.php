<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
<!--    bar vertical-->
    <div class="row">
<!--        profil-->
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <div class="image-container rounded-circle">
                <img src="files/vivi.png" class="img-fluid rounded-circle">

<!--                <div class="col-md-2 d-flex align-items-center justify-content-center">-->
<!--                    <button type="button" class="btn btn-secondary">Edit</button>-->
<!--                </div>-->
<!--                -->
            </div>
            <br>

        </div>


        <div class="col-md-5 d-flex align-items-center justify-content-center">

            <canvas id="bar"></canvas>

        </div>


<!--    pie chart-->


        <div class="col-md-5 d-flex align-items-center justify-content-center">
            <div class="square">
            <canvas id="pie"></canvas>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-3 ">
            <button class="btn btn-success btn-block">Informations sur le compte</button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-block right">Consulter mes RDV</button>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container rounded-circle">
                        <img src="files/julien.PNG" class="img-fluid ">
                    </div>
                </div>
                <div class="col-md-6">

                    <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet et in maiores minus nulla tempore totam? At fuga molestias quia, sapiente vero voluptatum. Accusamus iure nemo officiis porro quas sunt! </p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="row">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet et in maiores minus nulla tempore totam? At fuga molestias quia, sapiente vero voluptatum. Accusamus iure nemo officiis porro quas sunt! </p>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container rounded-circle">
                        <img src="files/julien.PNG" class="img-fluid ">
                    </div>
                </div>
            </div>
        </div>

    </div>




</div>

<!--bar vertical-->
<script>
    var ctx = document.getElementById('bar').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Bouchon', 'test1', 'test2', 'test3', 'test4'],
            datasets: [{
                label:'Données',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Diagramme en batons',
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }

            }
        }
    });
</script>

<!--pie chart-->

<script>
    var ctx = document.getElementById('pie').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Test1', 'Test2', 'Test3'],
            datasets: [{
                label: 'Données',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Diagramme circulaire',
                    position: 'bottom'
                }
            },
            responsive: true
        }
    });
</script>
</body>
</html>
