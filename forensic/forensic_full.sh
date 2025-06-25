#!/bin/bash

# Full Android ADB Forensic Script
# Author: MUH-Nirob
# Purpose: Collect forensic info, check suspicious apps, analyze logs, generate HTML report

# Set output directory
OUTPUT_DIR="./forensic_data"
REPORT_FILE="./forensic_report.html"

mkdir -p "$OUTPUT_DIR"

echo "===== Starting Forensic Data Collection ====="

echo "[1/6] Checking connected ADB devices..."
adb devices > "$OUTPUT_DIR/adb_devices.txt"

echo "[2/6] Collecting device properties..."
adb shell getprop > "$OUTPUT_DIR/device_properties.txt"

echo "[3/6] Collecting CPU info..."
adb shell dumpsys cpuinfo > "$OUTPUT_DIR/cpu_info.txt"

echo "[4/6] Collecting Battery info..."
adb shell dumpsys battery > "$OUTPUT_DIR/battery_info.txt"

echo "[5/6] Listing installed third-party packages..."
adb shell pm list packages -3 > "$OUTPUT_DIR/installed_packages.txt"

echo "[6/6] Getting all running processes..."
adb shell ps -A > "$OUTPUT_DIR/process_list.txt"

echo "[7/6] Collecting device logcat logs (last 5000 lines)..."
adb shell logcat -d -t 5000 > "$OUTPUT_DIR/logcat_log.txt"

echo "===== Data collection complete ====="
echo

# Suspicious package scanning
echo "===== Checking for suspicious installed apps ====="

MALWARE_SIGNATURES=("spy" "trojan" "keylogger" "malware" "hacker" "virus" "adware" "rootkit" "backdoor")

SUSPICIOUS_APPS="$OUTPUT_DIR/suspicious_apps.txt"
> "$SUSPICIOUS_APPS"

while read -r package; do
  for sig in "${MALWARE_SIGNATURES[@]}"; do
    if echo "$package" | grep -iq "$sig"; then
      echo "$package" >> "$SUSPICIOUS_APPS"
      break
    fi
  done
done < "$OUTPUT_DIR/installed_packages.txt"

if [ -s "$SUSPICIOUS_APPS" ]; then
  echo "Suspicious apps found:"
  cat "$SUSPICIOUS_APPS"
else
  echo "No suspicious apps detected."
fi
echo

# Log analysis for suspicious keywords
echo "===== Analyzing logs for suspicious activity ====="
LOG_ANALYSIS="$OUTPUT_DIR/log_analysis.txt"
grep -iE "error|fail|security|unauthorized|warning|exception|denied|forbidden|attack|malware|root|exploit" "$OUTPUT_DIR/logcat_log.txt" > "$LOG_ANALYSIS"

if [ -s "$LOG_ANALYSIS" ]; then
  echo "Suspicious log entries found, saved to $LOG_ANALYSIS"
else
  echo "No suspicious log entries found."
fi
echo

# Generate simple HTML report
echo "===== Generating HTML forensic report ====="

cat > "$REPORT_FILE" <<EOF
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Android ADB Forensic Report</title>
<style>
  body { font-family: Arial, sans-serif; margin: 2em; background:#f9f9f9; color:#333;}
  h1, h2 { color: #2c3e50; }
  pre { background: #eee; padding: 1em; border-radius: 5px; overflow-x: auto; }
  .section { margin-bottom: 2em; }
</style>
</head>
<body>
<h1>Android ADB Forensic Report</h1>
<div class="section">
<h2>Connected Devices</h2>
<pre>$(cat "$OUTPUT_DIR/adb_devices.txt")</pre>
</div>
<div class="section">
<h2>Device Properties</h2>
<pre>$(cat "$OUTPUT_DIR/device_properties.txt")</pre>
</div>
<div class="section">
<h2>CPU Info</h2>
<pre>$(cat "$OUTPUT_DIR/cpu_info.txt")</pre>
</div>
<div class="section">
<h2>Battery Info</h2>
<pre>$(cat "$OUTPUT_DIR/battery_info.txt")</pre>
</div>
<div class="section">
<h2>Installed Third-party Packages</h2>
<pre>$(cat "$OUTPUT_DIR/installed_packages.txt")</pre>
</div>
<div class="section">
<h2>Suspicious Apps Detected</h2>
<pre>$( [ -s "$SUSPICIOUS_APPS" ] && cat "$SUSPICIOUS_APPS" || echo "None found.")</pre>
</div>
<div class="section">
<h2>Running Processes</h2>
<pre>$(cat "$OUTPUT_DIR/process_list.txt")</pre>
</div>
<div class="section">
<h2>Suspicious Log Entries</h2>
<pre>$( [ -s "$LOG_ANALYSIS" ] && cat "$LOG_ANALYSIS" || echo "None found.")</pre>
</div>
</body>
</html>
EOF

echo "===== Forensic report generated at $REPORT_FILE ====="
echo "Process complete."
