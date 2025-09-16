import sys
from datetime import datetime

if len(sys.argv) < 4:
    print("<h3>Please provide a, b, and c through the form.</h3>")
else:
    try:
        a = float(sys.argv[1])
        b = float(sys.argv[2])
        c = float(sys.argv[3])
        
        if a == 0:
            raise ValueError("'a' cannot be zero (division by zero)")
        
        c_cubed = c ** 3
        sqrt_val = c_cubed ** 0.5
        division = sqrt_val / a 
        multiplication = division * 10
        result = multiplication + b
        
     
        print("<pre>")
        print("===========================================")
        print("Assignment #2")
        print("Roldán")
        print()
        print(f"Final Result: {result:.2f}")
        print()
        print(f"Step 1: c = {c} , c³ = {c_cubed:.0f}")
        print(f"Step 2: √(c³) = {sqrt_val:.2f}")
        print(f"Step 3: {sqrt_val:.2f} / {a} = {division:.2f}")
        print(f"Step 4: {division:.2f} * 10 = {multiplication:.2f}")
        print(f"Step 5: {multiplication:.2f} + {b} = {result:.2f}")
        print()
        print("Calculation completed at", datetime.now().strftime("%Y-%m-%d %H:%M:%S"))
        print("===========================================")
        print("</pre>")
        
    except ValueError as e:
        if "could not convert" in str(e):
            print(f"<p style='color:red;'>Error: Please enter valid numbers</p>")
        else:
            print(f"<p style='color:red;'>Error: {str(e)}</p>")
    except Exception as e:
        print(f"<p style='color:red;'>Unexpected error: {str(e)}</p>")