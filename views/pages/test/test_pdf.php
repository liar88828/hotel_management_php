<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF with jsPDF</title>

    <!-- Include jsPDF from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>

    <h1>Hello World!</h1>
    <p>This is a simple example to generate PDF from HTML using jsPDF.</p>

    <!-- Button to trigger PDF generation -->
    <button onclick="generatePDF()">Download PDF</button>

    <script>
        function generatePDF() {
            // Access jsPDF from the global object
            const { jsPDF } = window.jspdf;

            // Create a new instance of jsPDF
            const doc = new jsPDF();

            // Add content to the PDF
            doc.text("Hello World!", 10, 10);
            doc.text("This is a PDF generated using jsPDF from a CDN.", 10, 20);

            // Save the generated PDF
            doc.save("output.pdf");
        }
    </script>
</body>
</html>
