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
      padding:10px 20px;
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
  <h1 style="text-decoration: underline">Sales Report</h1>
<table class="tg">
    <thead>
      <tr>
        <th class="tg-0pky" style="width: 5%"><strong>S/N</strong></th>
        <th class="tg-0pky" style="width: 19%"><strong>Car Reg No</strong></th>
        <th class="tg-0pky" style="width: 19%"><strong>Services</strong></th>
        <th class="tg-0pky" style="width: 19%"><strong>Washed By</strong></th>
        <th class="tg-0pky" style="width: 19%"><strong>Date</strong></th>
        <th class="tg-0pky" style="width: 19%"><strong>Total</strong></th>
      </tr>
    </thead>
    <tbody>
      @foreach($sales as $sale)
        <tr>
          <td class="tg-phtq">
            {{$loop->iteration}}
          </td>
          <td class="tg-phtq">
            {{$sale->customer['car_reg_no']}}
          </td>
          <td class="tg-phtq">
              {{$sale->service['name']}}
          </td>
          <td class="tg-phtq">
              {{$sale['washer']}}
          </td>
          <td class="tg-phtq">
              {{$sale['date']}}
          </td>
          <td class="tg-phtq">
              {{$sale['total']}}
          </td>
        </tr>
      @endforeach
      <tr>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"><strong>Grand Total</strong></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"></td>
        <td class="tg-0pky"><strong>{{$grandTotal}}</strong></td>
      </tr>
    </tbody>
  </table>

</center>


