#!/bin/bash

LOG_DIR="$HOME/monitor_logs"
mkdir -p "$LOG_DIR"

echo "==== Termux Monitoring Started at $(date) ====" | tee -a "$LOG_DIR/monitor.log"

# 1. Network Connections (live snapshot)
echo "----- Active Network Connections -----" | tee -a "$LOG_DIR/monitor.log"
ss -tunap | tee -a "$LOG_DIR/monitor.log"

# 2. Running Processes (top 10 by CPU)
echo -e "\n----- Top 10 CPU Consuming Processes -----" | tee -a "$LOG_DIR/monitor.log"
ps aux --sort=-%cpu | head -n 11 | tee -a "$LOG_DIR/monitor.log"

# 3. Disk Usage
echo -e "\n----- Disk Usage -----" | tee -a "$LOG_DIR/monitor.log"
df -h | tee -a "$LOG_DIR/monitor.log"

# 4. Recent Modified Files in HOME (last 24 hours)
echo -e "\n----- Recently Modified Files in HOME (24h) -----" | tee -a "$LOG_DIR/monitor.log"
find "$HOME" -type f -mtime -1 -exec ls -lt {} + | tee -a "$LOG_DIR/monitor.log"

# 5. DNS Servers Configured
echo -e "\n----- Configured DNS Servers -----" | tee -a "$LOG_DIR/monitor.log"
getprop net.dns1 | tee -a "$LOG_DIR/monitor.log"
getprop net.dns2 | tee -a "$LOG_DIR/monitor.log"

# 6. Public IP Address
echo -e "\n----- Public IP Address -----" | tee -a "$LOG_DIR/monitor.log"
curl -s ifconfig.me | tee -a "$LOG_DIR/monitor.log"

# 7. System Uptime
echo -e "\n----- System Uptime -----" | tee -a "$LOG_DIR/monitor.log"
uptime | tee -a "$LOG_DIR/monitor.log"

# 8. Battery Status
echo -e "\n----- Battery Status -----" | tee -a "$LOG_DIR/monitor.log"
termux-battery-status | tee -a "$LOG_DIR/monitor.log"

echo -e "\n==== Monitoring Complete at $(date) ====" | tee -a "$LOG_DIR/monitor.log"

echo -e "\nLogs saved at $LOG_DIR/monitor.log"
