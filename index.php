<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Moisture Calculator</title>

<style>

*{
    box-sizing:border-box;
}

body{
    font-family:Arial, sans-serif;
    margin:0;
    padding:15px;
    background:#f5f5f5;
}

.container{
    width:100%;
    max-width:450px;
    margin:auto;
    background:#ffffff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

.box{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
}

input{
    width:100%;
    padding:12px;
    font-size:16px;
    border:1px solid #ccc;
    border-radius:8px;
}

button{
    width:100%;
    padding:14px;
    font-size:18px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    background:#007bff;
    color:white;
}

button:hover{
    opacity:0.9;
}

#result{
    margin-top:20px;
    font-size:18px;
    line-height:1.8;
    word-wrap:break-word;
}

/* Responsive */
@media (max-width:480px){

    body{
        padding:10px;
    }

    .container{
        padding:15px;
    }

    input,
    button{
        font-size:16px;
    }

}

</style>
</head>

<body>

<div class="container">

<h2>Moisture Calculator</h2>

<div class="box">
    <label>Sand (Kg)</label>
    <input type="number" id="x" value=" ">
</div>

<div class="box">
    <label>Moisture (%)</label>
    <input type="number" id="y" value=" ">
</div>

<div class="box">
    <label>Water (Kg)</label>
    <input type="number" id="water" value=" ">
</div>

<div class="box">
    <label>Batch(คิว)</label>
    <input type="number" id="batch" value=" ">
</div>

<button onclick="calculate()">Calculate กดสิ</button>

<div id="result"></div>

</div>

<script>

function calculate(){

    let x = parseFloat(document.getElementById("x").value) || 0;

    let yPercent = parseFloat(document.getElementById("y").value) || 0;

    let water = parseFloat(document.getElementById("water").value) || 0;

    let batch = parseFloat(document.getElementById("batch").value) || 0;

    let y = yPercent / 100;

   // moisture
    let moisture = x * (y + Math.pow(y,2) + Math.pow(y,3));

    // Total ต่อ Batch
    let totalPerBatch =
        x + moisture;

    // รวมทั้งหมด
    let grandTotal =
        totalPerBatch * batch;

    // Water - Moisture
    let waterMinusMoisture =
        water - moisture;

    document.getElementById("result").innerHTML = `
        <strong>Moisture :</strong> ${moisture.toFixed(2)} KG <br>
        <strong>Water - Moisture :</strong> ${waterMinusMoisture.toFixed(2)}  KG<br>
       <strong>Total / Batch :
</strong> ${totalPerBatch.toFixed(2)} KG <br>
        
        <strong>Target Total :</strong> ${grandTotal.toFixed(2)} KG
    `;
}

</script>

</body>
</html>