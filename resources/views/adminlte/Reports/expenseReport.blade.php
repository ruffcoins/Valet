<style type="text/css">
    .tg  {
      border-collapse:collapse;
      border-color:#aabcfe;
      border-spacing:0;
    }
    .tg td{
      background-color:#e8edff;
      border-color:#aabcfe;
      border-style:solid;
      border-width:1px;
      color:#669;
      font-family:Arial, sans-serif;
      font-size:14px;
      overflow:hidden;
      padding:5px 10px;
      /* word-break:normal; */
    }
    .tg th{
      background-color:#b9c9fe;
      border-color:#aabcfe;
      border-style:solid;
      border-width:1px;
      color:#039;
      font-family:Arial, sans-serif;
      font-size:14px;
      font-weight:normal;
      overflow:hidden;
      padding:10px 20px;
      /* word-break:normal; */
    }
    .tg .tg-phtq{
      background-color:#D2E4FC;
      border-color:inherit;
      text-align:left;
      vertical-align:top
    }
    .tg .tg-0pky{
      border-color:inherit;
      text-align:left;
      vertical-align:top
    }
    .btn {
      display: inline-block;
      font-weight: 400;
      color: #212529;
      text-align: center;
      vertical-align: middle;
      cursor: pointer;
      background-color: transparent;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-success {
      color: #ffffff;
      background-color: #28a745;
      border-color: #28a745;
    }
  </style>

<center>
<h1 style="text-decoration: underline">Expense Report</h1>
</center>
 
<table class="tg">
    <thead>
      <tr>
        <th class="tg-0pky" style="width: 1%"><strong>S/N</strong></th>
        <th class="tg-0pky" style="width: 15%"><strong>Payee</strong></th>
        <th class="tg-0pky" style="width: 15%"><strong>Expense</strong></th>
        <th class="tg-0pky" style="width: 20%"><strong>Purpose</strong></th>
        <th class="tg-0pky" style="width: 15%"><strong>Phone</strong></th>
        <th class="tg-0pky" style="width: 15%"><strong>Date</strong></th>
        <th class="tg-0pky" style="width: 15%"><strong>Cost</strong></th>

      </tr>
    </thead>
    <tbody>
      @foreach($expenses as $expense)
        <tr>
          <td class="tg-phtq">
            {{$loop->iteration}}
          </td>
          <td class="tg-phtq">
            {{$expense['first_name']}} {{$expense['last_name']}}
          </td>
          <td class="tg-phtq">
              {{$expense['expense_name']}}
          </td>
          <td class="tg-phtq">
              {{$expense['expense_purpose']}}
          </td>
          <td class="tg-phtq">
              {{$expense['phone']}}
          </td>
          <td class="tg-phtq">
              {{$expense['expense_date']}}
          </td>
          <td class="tg-phtq">
              {{$expense['expense_cost']}}
          </td>
        </tr>
      @endforeach
      <tr>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"><strong>Grand Total</strong></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"><strong>{{$grandTotal}}.0</strong></td>
      </tr>
    </tbody>
  </table>
  

