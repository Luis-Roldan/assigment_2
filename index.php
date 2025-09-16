<!DOCTYPE html>
<html>
<head>
  <title>Calculator</title>
</head>
<body>
    <div class="form-container">
        <h2>Enter values</h2>
        
        <form method="get" action="">
            a: <input type="text" name="a" required value="<?php echo isset($_GET['a']) ? htmlspecialchars($_GET['a']) : ''; ?>"><br><br>
            b: <input type="text" name="b" required value="<?php echo isset($_GET['b']) ? htmlspecialchars($_GET['b']) : ''; ?>"><br><br>
            c: <input type="text" name="c" required value="<?php echo isset($_GET['c']) ? htmlspecialchars($_GET['c']) : ''; ?>"><br><br>
            <input type="submit" value="Calculate">
            <button type="button" onclick="clearForm()">Clear & New Calculation</button>
        </form>
    </div>

    <div class="result">
        <?php
        if(isset($_GET['a'], $_GET['b'], $_GET['c']) && $_GET['a'] !== '' && $_GET['b'] !== '' && $_GET['c'] !== '') {
            $a = escapeshellarg($_GET['a']);
            $b = escapeshellarg($_GET['b']);
            $c = escapeshellarg($_GET['c']);
                      
            $output = shell_exec("python3 calculate.py $a $b $c 2>&1");
                                  
            $output = preg_replace('/Content-type: text\/html\s*\n+/', '', $output);
                     
            echo $output;
            
          
            echo "<script>
                setTimeout(function() {
                    if (confirm('¿Calculation complete! Clear fields for a new calculation?')) {
                        window.location.href = window.location.pathname;
                    }
                }, 3000);
            </script>";
        } else {
            echo "<p>Please enter values for a, b, and c and press Calculate.</p>";
        }
        ?>
    </div>

    <script>
        function clearForm() {
           
            window.location.href = window.location.pathname;
        }

    
    </script>
</body>
</html>

