# Workshelf API

This Laravel project exposes a handful of utility APIs. Every endpoint is
available under the `/api` prefix.

## Endpoints

### Convert milliseconds to minutes
`GET /api/convert-ms-to-minutes`

Query parameters:
- `ms_value` – integer value in milliseconds.

Returns the number of minutes represented by the provided milliseconds.

### Interest repayment calculation
`GET /api/interest-repayment-calculation`

Query parameters:
- `amount` – principal loan amount.
- `months` – number of months for the loan term.
- `interest` – annual interest rate as a percentage.

Responds with a breakdown of monthly interest and total repayment.

### Electric vehicle mileage cost
`POST /api/calculate-ev-mileage`

Body (JSON):
- `battery_kwh` – battery capacity in kWh.
- `cost_per_kwh` – cost of electricity per kWh.
- `range_miles` – vehicle range on a full charge in miles.

Calculates the cost of a full charge and cost per mile.

### Petrol vehicle mileage cost
`POST /api/calculate-petrol-mileage`

Body (JSON):
- `tank_litres` – tank size in litres.
- `cost_per_litre` – fuel price per litre.
- `range_miles` – optional range in miles.
- `mpg` – optional miles per gallon; required if `range_miles` is not provided.

Returns the cost of a full tank and cost per mile.

### Area calculation
`GET /api/calculate-area`

Query parameters:
- `length_cm` – length in centimetres.
- `width_cm` – width in centimetres.

Responds with the area in cm² and m².

### Percentage increase
`GET /api/percentage-increase`

Query parameters:
- `principal` – starting amount.
- `rate` – annual rate percentage.
- `months` – number of months for growth.
- `monthly_addition` – optional amount added each month.

Calculates the final value using monthly compounding.

---

Visit `/blog` to read posts from the **100APIsOfCode** series.

## Claude Code - WSL repo added to testing

This repository has been added to WSL for testing with Claude Code integration.
