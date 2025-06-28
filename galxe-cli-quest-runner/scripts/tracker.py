import requests
import json

# Galxe API Endpoint (Example, official API might need token)
GALXE_API = "https://galxe.com/api/v1/quests/active"

def fetch_active_quests():
    try:
        response = requests.get(GALXE_API)
        if response.status_code == 200:
            data = response.json()
            quests = data.get('data', {}).get('quests', [])
            if not quests:
                print("No active quests found.")
                return
            print(f"Found {len(quests)} active quests:\n")
            for q in quests:
                print(f"➡️ Quest: {q.get('title')}")
                print(f"   Status: {q.get('status', 'N/A')}")
                print(f"   Network: {q.get('chain', 'N/A')}")
                print(f"   URL: https://galxe.com{q.get('path')}")
                print("-"*40)
        else:
            print(f"Error fetching quests: {response.status_code}")
    except Exception as e:
        print(f"Exception occurred: {e}")

if __name__ == "__main__":
    fetch_active_quests()
