<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF Report</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .btn { 
            background: #007bff; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 16px; 
            margin: 10px;
        }
        .btn:hover { background: #0056b3; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; }
        input, select { padding: 8px; width: 200px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📄 Generate PDF Report</h1>
        
        <!-- Simple Form -->
        <!-- <form method="GET" action="generate_pdf.php" target="_blank">
            <div class="form-group">
                <label>Start Date:</label>
                <input type="date" name="start_date" value="<?php echo date('Y-m-01'); ?>">
            </div>
            
            <div class="form-group">
                <label>End Date:</label>
                <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>">
            </div>
            
            <div class="form-group">
                <label>Report Type:</label>
                <select name="report_type">
                    <option value="sales">Sales Report</option>
                    <option value="users">Users Report</option>
                    <option value="products">Products Report</option>
                </select>
            </div>
            
            <button type="submit" class="btn">
                📥 Generate PDF
            </button>
        </form> -->

        <form action="generacion_pdf.php" method="POST" target="_blank">
            <!-- <legend>BUSCADOR</legend> -->
            <div>
                <input type="text" REQUIRED name="id-cliente" placeholder="CLIENTE" value="" class="inputCliente" />
            </div>
            <div>
                <input type="text" REQUIRED name="modelo" placeholder="MODELO" value="" class="inputModelo" />
            </div>
            <button type="submit" class="btn">
                📥 Generate PDF
            </button>
        </form>
        
        <!-- Quick Report Buttons -->
        <!-- <div style="margin-top: 20px;">
            <h3>Quick Reports:</h3>
            <button class="btn" onclick="quickReport('today')">Today's Report</button>
            <button class="btn" onclick="quickReport('week')">This Week</button>
            <button class="btn" onclick="quickReport('month')">This Month</button>
        </div> -->
    </div>

    <!-- <script>
    function quickReport(type) {
        let url = 'generate_pdf.php?';
        
        if (type === 'today') {
            url += 'start_date=' + new Date().toISOString().split('T')[0];
            url += '&end_date=' + new Date().toISOString().split('T')[0];
        } else if (type === 'week') {
            let start = new Date();
            start.setDate(start.getDate() - 7);
            url += 'start_date=' + start.toISOString().split('T')[0];
            url += '&end_date=' + new Date().toISOString().split('T')[0];
        } else if (type === 'month') {
            let start = new Date();
            start.setDate(1);
            url += 'start_date=' + start.toISOString().split('T')[0];
            url += '&end_date=' + new Date().toISOString().split('T')[0];
        }
        
        window.open(url, '_blank');
    }
    </script> -->
</body>
</html>