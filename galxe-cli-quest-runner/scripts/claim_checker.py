import requests

# Galxe API Example Endpoint (আপনার প্রকল্প অনুসারে ঠিক করতে হবে)
CLAIM_API = "https://galxe.com/api/v1/quests/claimable"

def fetch_claimable_rewards():
    try:
        response = requests.get(CLAIM_API)
        if response.status_code == 200:
            data = response.json()
            rewards = data.get('data', {}).get('rewards', [])
            if not rewards:
                print("No claimable rewards at the moment.")
                return
            print(f"Found {len(rewards)} claimable rewards:\n")
            for r in rewards:
                print(f"🎁 Reward: {r.get('name')}")
                print(f"    Type: {r.get('type')}")
                print(f"    Status: {r.get('status')}")
                print(f"    Claim URL: https://galxe.com{r.get('claim_path')}")
                print("-"*40)
        else:
            print(f"Error fetching claimable rewards: {response.status_code}")
    except Exception as e:
        print(f"Exception occurred: {e}")

if __name__ == "__main__":
    fetch_claimable_rewards()
