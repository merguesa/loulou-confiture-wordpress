# Simple WordPress Table Prefix Converter
# Converts wp_ to xxml_ and updates URLs

param(
    [string]$InputFile = "loulouconf.sql",
    [string]$OutputFile = "loulouconf-hosting-fixed.sql"
)

Write-Host "Converting database..." -ForegroundColor Green

if (-not (Test-Path $InputFile)) {
    Write-Host "Error: File not found: $InputFile" -ForegroundColor Red
    exit 1
}

try {
    $content = Get-Content $InputFile -Raw -Encoding UTF8
    
    # Convert table prefixes - all variations
    $content = $content -replace "CREATE TABLE ``wp_", "CREATE TABLE ``xxml_"
    $content = $content -replace "INSERT INTO ``wp_", "INSERT INTO ``xxml_"
    $content = $content -replace "DROP TABLE IF EXISTS ``wp_", "DROP TABLE IF EXISTS ``xxml_"
    $content = $content -replace "ALTER TABLE ``wp_", "ALTER TABLE ``xxml_"
    $content = $content -replace "-- Table structure for table ``wp_", "-- Table structure for table ``xxml_"
    $content = $content -replace "-- Dumping data for table ``wp_", "-- Dumping data for table ``xxml_"
    $content = $content -replace "-- Indexes for table ``wp_", "-- Indexes for table ``xxml_"
    $content = $content -replace "KEY ``wp_", "KEY ``xxml_"
    $content = $content -replace "CONSTRAINT ``wp_", "CONSTRAINT ``xxml_"
    
    # Convert URLs
    $content = $content -replace "http://localhost/loulouConfiture", "http://loulouconfiture.com"
    $content = $content -replace "localhost/loulouConfiture", "loulouconfiture.com"
    
    # Save result
    $content | Out-File $OutputFile -Encoding UTF8
    
    Write-Host "SUCCESS: Conversion complete!" -ForegroundColor Green
    Write-Host "Output file: $OutputFile" -ForegroundColor Cyan
    
} catch {
    Write-Host "Error: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}