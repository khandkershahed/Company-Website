<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Price Quotation - {{ $quotation->pq_code ?? 'N/A' }}</title>
  <style>
    @font-face {
      font-family: 'Montserrat';
      font-style: normal;
      font-weight: 400;
      src: url(data:font/truetype;charset=utf-8;base64,AAEAAAASAQAABAAgR0RFRrRCsIIAAjWsAAACYkdQT1P///+cAAIpgAAAgW9HU1VCAAAFkAAAAbxmT1MvMgAAAZAAAAgKkZHU1VCAAAAoAAAABxmaWx5ZhJOBAAAoAAADZMaGVhZIAAAHoAAAANmhoZWEAEQBEAAAATmhtdHgAAwAOAAAAXGxvY2EAAgAeAAAAYmxvY2EAAAGIAAABpG1heHAABwAJAAAAGG5hbWUAAACIAAAAS3Bvc3QAAwAAAAAiAAABAAAAAAEAAAABAAMAAQAAABQABAAUAA4AAgAkAAQAAAQAAAUABAAAQAAkAAgAFAAEAAGwB3wAAAQABAAAAAAAAAAAAAAAAAAAAAAABAAEAAQAAAAEAAf//AAABAAEAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA) format('truetype');
    }

    body,
    html {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      font-size: 12px;
      width: 210mm;
      box-sizing: border-box;
    }
  </style>
</head>

<body style="margin:0; padding:0; width:100%; font-family: 'Montserrat', sans-serif; font-size: 12px;">

  <!-- Main Table Structure -->
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
    style="border-collapse: collapse; width: 100%;">

    <!-- Header Section - Will repeat on every page -->
    <thead style="display: table-header-group;">
      <tr>
        <td style="background-color: #ae0a46; height: 61px; padding: 0 30px; border-bottom: 1px solid #eee;">
          <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
            <tr>
              <td style="vertical-align: middle;">
                <img src="https://www.ngenitltd.com/frontend/images/white_logo.png" alt="Logo" style="height: 40px; display: block;" />
              </td>
              <td
                style="color: white; font-weight: 700; font-size: 24px; text-align: right; vertical-align: middle; margin-left: 127px;">
                {{ $quotation->quotation_title ?? 'N/A' }}
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </thead>

    <!-- Main Content Area -->
    <tbody style="display: table-row-group;">
      <tr>
        <td
          style="padding: 20px 30px 0 30px; border-left: 1px solid #eee; border-right: 1px solid #eee; vertical-align: top;">

          <!-- Company Info Table -->
          <table role="presentation" width="100%" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
            <tr>
              <td style="font-weight: 600; width: 65%; border: none; padding: 0;">
                {{ $quotation->company_name ?? 'N/A' }}
              </td>
              <td style="font-weight: 500; border: none; padding: 0;">PQ: {{ $quotation->pq_code ?? 'N/A' }}
              </td>
            </tr>
            <tr>
              <td style="font-weight: normal; padding-top: 5px; padding-left:0;border: none;">
                {{ $quotation->name ?? 'N/A' }} | {{ $quotation->designation ?? 'N/A' }}
              </td>
              <td style="font-weight: normal; padding-top: 5px; padding-left:0;border: none;">Date: {{ $quotation->quotation_date ?? 'N/A' }}
              </td>
            </tr>
            <tr>
              <td style="font-weight: normal; padding-top: 5px; padding-left:0;border: none;">
                {{ $quotation->email ?? 'N/A' }} | {{ $quotation->phone ?? 'N/A' }}</td>
              <td style="font-weight: normal; padding-top: 5px; padding-left:0;border: none;">PQR: {{ $quotation->pqr_code ?? 'N/A' }}
              </td>
            </tr>
            <tr>
              <td style="font-weight: normal; padding-top: 5px; padding-left:0;border: none;">
                {{ $quotation->address ?? 'N/A' }}
              </td>
            </tr>
          </table>

          <!-- Products Table -->
          <table role="presentation" width="100%" cellspacing="0" cellpadding="10"
            style="border-collapse: collapse; margin-top: 40px; border: 1px solid #eee; font-size: 12px;">
            <thead>
              <tr style="background-color: #f0f0f0;">
                <th style="width:5%; font-weight: 500; text-align: left; border-bottom: 1px solid #eee;">Sl</th>
                <th style="width:50%; font-weight: 500; text-align: left; border-bottom: 1px solid #eee;">PRODUCT
                  DESCRIPTION</th>
                <th style="width:10%; font-weight: 500; text-align: center; border-bottom: 1px solid #eee;">QTY</th>
                <th style="width:20%; font-weight: 500; text-align: right; border-bottom: 1px solid #eee;">UNIT PRICE
                </th>
                <th style="width:15%; font-weight: 500; text-align: right; border-bottom: 1px solid #eee;">
                  TOTAL ({{ $currency ?? 'N/A' }})
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($products->count() > 0)
                @foreach ($products as $quotationproduct)
                  <tr style="border-bottom: 1px solid #eee;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $quotationproduct->product_name }}</td>
                    <td style="text-align: center;">{{ $quotationproduct->qty }}</td>
                    <td style="text-align: right;">
                      {{ number_format(round((float) optional($quotationproduct)->unit_final_price), 2) }}
                    </td>
                    <td style="text-align: right;">
                      {{ number_format(round((float) optional($quotationproduct)->unit_final_total_price), 2) }}
                    </td>
                  </tr>
                @endforeach
              @endif
              
              <tr style="background-color: #eeeeee3d;">
                <td colspan="4"
                  style="text-align: right; font-weight: 600; border-bottom: 1px solid #eee;">Sub-total
                </td>
                <td style="text-align: right; font-weight: 700; border-bottom: 1px solid #eee;">
                  {{ number_format(round((float) optional($singleproduct)->sub_total_final_total_price), 2) }}
                </td>
              </tr>
              
              @if(optional($quotation)->vat_display == '1')
                <tr>
                  <td colspan="4"
                    style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                    VAT / GST - {{ optional($singleproduct)->vat_percentage }}%
                  </td>
                  <td style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                    {{ number_format(round((float) optional($singleproduct)->vat_final_total_price ?? '0.00'), 2) }}
                  </td>
                </tr>
              @endif
              
              <tr>
                <td colspan="4"
                  style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                  Special Discount - {{ optional($singleproduct)->special_discount_percentage }}%
                </td>
                <td style="text-align: right; font-weight: 400; font-size: 12px; border-bottom: 1px solid #eee;">
                  {{ number_format(round((float) optional($singleproduct)->special_discount_final_total_price ?? '0.00'), 2) }}
                </td>
              </tr>
              
              <tr style="background-color: #eee;">
                <td colspan="4" style="text-align: right; font-weight: 600;">Grand Total</td>
                <td style="text-align: right; font-weight: 600;">
                  {{ number_format(round((float) optional($singleproduct)->total_final_total_price), 2) }}
                </td>
              </tr>
            </tbody>
          </table>

          <!-- GST & Terms -->
          <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
            style="border-collapse: collapse; margin-top: 10px;">
            @if(optional($quotation)->vat_display == '1')
              <tr>
                <td style="text-align: center; font-weight: 700; padding-bottom: 10px; border: none;">
                  GST included. It may apply.
                </td>
              </tr>
            @endif
            <tr>
              <td
                style="background-color: #f0f0f0; font-size: 14px; font-weight: 600; padding: 5px; border: none; text-align: left;">
                Terms & Conditions :
              </td>
            </tr>
          </table>

          <!-- Terms & Conditions Table -->
          <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
            style="border-collapse: collapse; margin-top: 5px; font-size: 12px;">
            <tbody>
              @foreach ($rfq_terms as $term)
                <tr>
                  <td style="font-weight: 500; padding: 5px; border: none; width: 150px;">
                    {{ $term->title ?? 'N/A' }}
                  </td>
                  <td style="font-weight: 500; padding: 5px; border: none; width: 10px;">:</td>
                  <td style="padding: 5px; border: none;">{{ $term->description ?? 'N/A' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </td>
      </tr>
    </tbody>

    <!-- Footer Section - Will repeat on every page -->
    <tfoot style="display: table-footer-group;">
      <!-- Footer Content Info -->
      <tr>
        <td style="border-top: 0px solid #eee;">
          <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
            style="border-collapse: collapse; background:#f9f9f9; margin-top: 50px; padding:20px 30px; width: 100%; border-right: 1px solid #eeeeee;">
            <tr style="padding-left: 20px; padding-right:20px">
              <td style="width: 75%; vertical-align: top; padding-right: 10px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                  style="border-collapse: collapse;">
                  <tr>
                    <td style="font-weight: 600; padding: 5px 30px;">
                      {{ $quotation->sender_name ?? 'N/A' }}
                    </td>
                    <td style="font-weight: normal; padding: 5px 0px;">
                      {{ $quotation->ngen_email ?? 'N/A' }}
                    </td>
                  </tr>
                  <tr>
                    <td style="font-weight: normal; padding: 0px 30px;">
                      {{ $quotation->sender_designation ?? 'N/A' }}
                    </td>
                    <td style="font-weight: normal; padding: 0;">
                      {{ $quotation->ngen_whatsapp_number ?? 'N/A' }} (What's App)
                    </td>
                  </tr>
                  <tr>
                    <td style="font-weight: normal; padding: 5px 30px;">Partner & Business Development</td>
                    <td style="font-weight: normal; padding: 0;">
                      {{ $quotation->ngen_number_two ?? 'N/A' }} (Skype)
                    </td>
                  </tr>
                </table>
              </td>
              <td style="width: 25%; vertical-align: top;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="5"
                  style="border-collapse: collapse; text-align: center;">
                  <tr>
                    <td style="font-weight: 500; padding: 0px 25px 0px 0px;">
                      <h3 style="margin: 0; padding: 5px 0px; color: #ae0a46;">
                        {{ $quotation->ngen_company_name ?? 'N/A' }}
                      </h3>
                      <p style="margin: 0; padding: 0;">
                        {{ $quotation->ngen_company_registration_number ?? 'N/A' }}
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>

          <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
            style="border-collapse: collapse; width: 100%;">
            <tr>
              <td style="background-color: #ae0a46; height: 45px; text-align: center; color: white;font-size: 16px;">
                <a href="https://www.ngenitltd.com"
                  style="font-family: 'Montserrat' font-size: 16px; font-weight: 500; line-height: 22.68px; letter-spacing: 0.1em; color: white; text-decoration: none;">
                  www.ngenitltd.com
                </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </tfoot>
  </table>

</body>
</html>