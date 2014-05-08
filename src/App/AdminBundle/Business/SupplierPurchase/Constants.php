<?phpnamespace App\AdminBundle\Business\SupplierPurchase;class Constants{    public static function getNominalCodes()    {        return [            "0010" => "0010 - Freehold property",            "0011" => "0011 - Leasehold property",            "0020" => "0020 - Plant & Machinery",            "0021" => "0021 - Plant & m/cy depreciation",            "0030" => "0030 - Office equipment",            "0031" => "0031 - Office equipt depreciation",            "0040" => "0040 - Furniture & fixtures",            "0041" => "0041 - Furniture & fxts depreciation",            "0050" => "0050 - Motor Vehicles",            "0051" => "0051 - Motor vehicles depreciation",            "1001" => "1001 - Stock",            "1002" => "1002 - Work in progress",            "1003" => "1003 - Finished goods",            "1100" => "1100 - Debtors Control account",            "1101" => "1101 - Sundry debtors",            "1102" => "1102 - Other debtors",            "1103" => "1103 - Prepayments",            "1200" => "1200 - Bank current account",            "1210" => "1210 - Bank deposit account",            "1220" => "1220 - Building society account",            "1230" => "1230 - Petty cash",            "1235" => "1235 - Cash receipts",            "1240" => "1240 - Company credit card",            "1250" => "1250 - Credit card receipts",            "2100" => "2100 - Creditors control account",            "2101" => "2101 - Sundry creditors",            "2102" => "2102 - Other creditors",            "2109" => "2109 - Accruals",            "2200" => "2200 - Sales Tax control account (VAT)",            "2201" => "2201 - Purchase Tax control account (VAT)",            "2202" => "2202 - VAT liability",            "2210" => "2210 - PAYE",            "2211" => "2211 - National Insurance",            "2220" => "2220 - Net wages",            "2230" => "2230 - Pension fund",            "2300" => "2300 - Loans",            "2310" => "2310 - Hire purchase",            "2320" => "2320 - Corporation tax",            "2330" => "2330 - Mortgages",            "3010" => "3010 - Preference shares",            "3100" => "3100 - Reserves",            "3101" => "3101 - Undistributed reserves",            "3200" => "3200 - Profit & Loss Account",            "4000" => "4000 - Sales type A",            "4001" => "4001 - Sales type B",            "4002" => "4002 - Sales type C",            "4009" => "4009 - Discounts allowed",            "4100" => "4100 - Sales type D",            "4101" => "4101 - Sales type E",            "4200" => "4200 - Sale of Assets",            "4400" => "4400 - Credit charges (late payments)",            "4900" => "4900 - Miscellaneous income",            "4901" => "4901 - Royalties received",            "4902" => "4902 - Commissions received",            "4903" => "4903 - Insurance claims",            "4904" => "4904 - Rent income",            "4905" => "4905 - Distribution & carriage",            "5000" => "5000 - Materials purchased",            "5001" => "5001 - Materials imported",            "5002" => "5002 - Miscellaneous purchases",            "5003" => "5003 - Packaging",            "5009" => "5009 - Discounts taken",            "5100" => "5100 - Carriage",            "5101" => "5101 - Import duty",            "5102" => "5102 - Transport insurance",            "5200" => "5200 - Opening stock",            "5201" => "5201 - Closing stock",            "6000" => "6000 - Productive Labour",            "6001" => "6001 - Cost of sales labour",            "6002" => "6002 - Sub-contractors",            "6100" => "6100 - Sales commissions",            "6200" => "6200 - Sales promotion",            "6201" => "6201 - Advertising",            "6202" => "6202 - Gifts & samples",            "6203" => "6203 - PR (literature 7 brochures)",            "6900" => "6900 - Miscellaneous expenses",            "7000" => "7000 - Gross wages",            "7001" => "7001 - Directors’ salaries",            "7002" => "7002 - Directors’ remuneration",            "7003" => "7003 - Staff salaries",            "7004" => "7004 - Wages – regular",            "7005" => "7005 - Wages – casual",            "7006" => "7006 - Employers’ NI",            "7007" => "7007 - Employers’ pensions",            "7008" => "7008 - Recruitment expenses",            "7009" => "7009 - Adjustments",            "7010" => "7010 - SSP reclaimed",            "7011" => "7011 - SMP reclaimed",            "7100" => "7100 - Rent",            "7102" => "7102 - Water rates",            "7103" => "7103 - General rates",            "7104" => "7104 - Premises insurance",            "7200" => "7200 - Electricity",            "7201" => "7201 - Gas",            "7202" => "7202 - Oil",            "7203" => "7203 - Other heating costs",            "7300" => "7300 - Fuel & oil (MOTOR)",            "7301" => "7301 - Repairs & servicing (MOTOR)",            "7302" => "7302 - Licenses",            "7303" => "7303 - Vehicle insurance",            "7304" => "7304 - Miscellaneous motor",            "7350" => "7350 - Scale charges",            "7400" => "7400 - Travelling",            "7401" => "7401 - Car hire",            "7402" => "7402 - Hotels",            "7403" => "7403 - UK Entertainment",            "7404" => "7404 - Overseas Entertainment",            "7405" => "7405 - Overseas travelling",            "7406" => "7406 - Subsistence",            "7500" => "7500 - Printing",            "7501" => "7501 - Postage & carriage",            "7502" => "7502 - Telephone",            "7503" => "7503 - Telex/telegram/fax",            "7504" => "7504 - Office stationery",            "7505" => "7505 - Books etc",            "7600" => "7600 - Legal fees",            "7601" => "7601 - Audit & accountancy fees",            "7602" => "7602 - Consultancy fees",            "7603" => "7603 - Professional fees",            "7700" => "7700 - Equipment hire",            "7701" => "7701 - Office m/c maintenance",            "7800" => "7800 - Repairs & renewals",            "7801" => "7801 - Cleaning",            "7802" => "7802 - Laundry",            "7803" => "7803 - Premises expenses",            "7900" => "7900 - Bank interest paid",            "7901" => "7901 - Bank charges",            "7902" => "7902 - Currency charges",            "7903" => "7903 - Loan interest paid",            "7904" => "7904 - HP interest",            "7905" => "7905 - Credit charges",            "7906" => "7906 - Exchange rate variance",            "8000" => "8000 - Depreciation",            "8001" => "8001 - Plant & m/cy depreciation",            "8002" => "8002 - Furniture/fittings depreciation",            "8003" => "8003 - Vehicle depreciation",            "8004" => "8004 - Office equipment depreciation",            "8100" => "8100 - Bad debt write off",            "8102" => "8102 - Bad debt provision",            "8200" => "8200 - Donations",            "8201" => "8201 - Subscriptions",            "8202" => "8202 - Clothing costs",            "8203" => "8203 - Training costs",            "8204" => "8204 - Insurance",            "8205" => "8205 - Refreshments",            "9998" => "9998 - Suspense account",            "9999" => "9999 - Mispostings account"        ];    }}