<!DOCTYPE html>
<html>
  <head>
    <title>Invoice</title>
    <style>
      /* Create a grid container for the invoice */
      .invoice-grid {
          display: grid;
          grid-template-columns: 2fr 1fr;
          grid-gap: 10px;
          margin: 50px;
      }
      /* Create grid items for the sender and client information */
      .sender-info {
          background-color: #f2f2f2;
          padding: 20px;
      }
      .client-info {
          background-color: #f2f2f2;
          padding: 20px;
      }
      /* Set margins for the table */
      table {
          margin: 50px;
      }
      /* Set margins for the total cost and conditions box */
      .total-cost {
          margin: 50px;
      }
      .conditions {
          margin: 50px;
      }
      /* Set margins for the footer */
      footer {
          margin: 50px;
      }
    </style>
  </head>
  <body>
    <header>
      <img src="logo.png" alt="Company logo" style="float:right;">
  <div style="float:left;">Facture N°: XXXXX</div>
    </header>
    <!DOCTYPE html>
<html>
<head>
 
</head>
<body>

<div class="invoice-grid">
  <div class="sender-info" style="grid-column: span 3;">
    <p>Company Name</p>
    <p>Email: info@company.com</p>
    <p>Date: 01/01/2021</p>
    <p>Code Postal</p>
    <p>Tel: 555-555-5555</p>
    <p>Date de Livraison: 01/01/2021</p>
    <p>Bank Number: 1234 5678 9012</p>
    <p>Address: 123 Main St</p>
    <p>Description:</p>
  </div>
  <div class="client-info">
    <div class="client-name">
      <p>Nom Client</p>
      <p>Address:</p>
    </div>
    <div class="client-contact">
      <p>Email: client@email.com</p>
      <p>Tel: 555-555-5555</p>
    </div>
  </div>
</div>

<table>
  <tr>
    <th>Name of Service/Product</th>
    <th>Description</th>
    <th>Cost</th>
    <th>TVA</th>
    <th>Quantity</th>
    <th>TTC</th>
  </tr>
  <tr>
    <td>Service 1</td>
    <td>Description 1</td>
    <td>$10.00</td>
    <td>5%</td>
    <td>1</td>
    <td>$10.50</td>
  </tr>
</table>

<div class="total-cost">
  <p>Total Cost: $100.50</p>
</div>
<div class="conditions">
  <p>Conditions and other remarks</p>
</div>
<footer>
  <p>A small description for the footer</p>
</footer>
</body>
</html>
  </body>
</html>
