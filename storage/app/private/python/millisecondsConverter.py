from pint import UnitRegistry
import sys, json

payload = json.load(sys.stdin)
value = payload.get("ms_value", "")

ureg = UnitRegistry()

def ms_to_m(ms: float | int) -> float:
    """
    Convert milliseconds to minutes using pint for clarity and
    automatic unit handling.
    """
    return (ms * ureg.millisecond).to(ureg.minute).magnitude

print(json.dumps({"ms_as_minutes": ms_to_m(value)}))
