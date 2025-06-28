#!/bin/bash

echo "Starting Galxe CLI Quest Runner..."

# Wallet check/import
echo -e "\n[1] Wallet Manager"
python3 scripts/wallet_manager.py

# Fetch active quests
echo -e "\n[2] Fetching active quests"
python3 scripts/tracker.py

# Check claimable rewards
echo -e "\n[3] Checking claimable rewards"
python3 scripts/claim_checker.py

echo -e "\nAll tasks completed."
echo "You can now open the server UI (if installed) with: python3 server/app.py"
