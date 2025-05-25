#!/usr/bin/env python
import sys, json
payload = json.load(sys.stdin)
value = payload.get("laravel_input", "")
print(json.dumps({"py_responce": value}))
