# WordPress Database Prefix & URL Conversion Script - Simple Version
# Converts local database for hosting migration
# Usage: .\convert-sql-simple.ps1

param(
    [string]$InputFile = "loulouconf.sql",
    [string]$OutputFile = "loulouconf-hosting.sql"
)

Write-Host "Converting WordPress database for hosting migration..." -ForegroundColor Yellow
Write-Host "   Input: $InputFile" -ForegroundColor Cyan
Write-Host "   Output: $OutputFile" -ForegroundColor Cyan

# Check if input file exists
if (-not (Test-Path $InputFile)) {
    Write-Host "ERROR: File '$InputFile' not found!" -ForegroundColor Red
    Write-Host "   Make sure your SQL export file is in the current directory." -ForegroundColor Yellow
    exit 1
}

try {
    # Read the SQL file
    Write-Host "Reading SQL file..." -ForegroundColor Green
    $content = Get-Content $InputFile -Raw -Encoding UTF8

    # Replace table prefixes
    Write-Host "Converting table prefixes (wp_ to xxml_)..." -ForegroundColor Green
    $content = $content -replace "CREATE TABLE `wp_", "CREATE TABLE `xxml_"
    $content = $content -replace "INSERT INTO `wp_", "INSERT INTO `xxml_"
    $content = $content -replace "DROP TABLE IF EXISTS `wp_", "DROP TABLE IF EXISTS `xxml_"
    $content = $content -replace "ALTER TABLE `wp_", "ALTER TABLE `xxml_"
    $content = $content -replace "REFERENCES `wp_", "REFERENCES `xxml_"
    
    # Handle table references in constraints and foreign keys
    $content = $content -replace "CONSTRAINT `wp_", "CONSTRAINT `xxml_"
    $content = $content -replace "KEY `wp_", "KEY `xxml_"
    $content = $content -replace "INDEX `wp_", "INDEX `xxml_"
    
    # Handle comments and structure references
    $content = $content -replace "-- Table structure for table `wp_", "-- Table structure for table `xxml_"
    $content = $content -replace "-- Dumping data for table `wp_", "-- Dumping data for table `xxml_"
    $content = $content -replace "-- Indexes for table `wp_", "-- Indexes for table `xxml_"
    $content = $content -replace "-- AUTO_INCREMENT for table `wp_", "-- AUTO_INCREMENT for table `xxml_"
    $content = $content -replace "-- Constraints for table `wp_", "-- Constraints for table `xxml_"
    
    # Handle any other wp_ references in SQL
    $content = $content -replace "`wp_([a-zA-Z0-9_]+)`", "`xxml_`$1"

    # Replace URLs
    Write-Host "Converting URLs..." -ForegroundColor Green
    $content = $content -replace "http://localhost/loulouConfiture", "http://loulouconfiture.com"
    $content = $content -replace "https://localhost/loulouConfiture", "http://loulouconfiture.com"
    $content = $content -replace "localhost/loulouConfiture", "loulouconfiture.com"
    $content = $content -replace "localhost:80/loulouConfiture", "loulouconfiture.com"
    
    # Handle serialized data URLs (WordPress often stores URLs in serialized format)
    $content = $content -replace "localhost\\/loulouConfiture", "loulouconfiture.com"
    
    # Replace file paths that might contain localhost
    $content = $content -replace "/xampp/htdocs/loulouConfiture", "/path/to/your/hosting/root"
    
    # IMPORTANT: Also fix any existing hosting URLs that might conflict
    $content = $content -replace "https://web.fixpc.store", "http://loulouconfiture.com"
    $content = $content -replace "web.fixpc.store", "loulouconfiture.com"

    # Save the modified content
    Write-Host "Saving converted file..." -ForegroundColor Green
    $content | Out-File $OutputFile -Encoding UTF8

    # Get file sizes for comparison
    $originalSize = (Get-Item $InputFile).Length
    $convertedSize = (Get-Item $OutputFile).Length

    Write-Host ""
    Write-Host "SUCCESS: Conversion completed!" -ForegroundColor Green
    Write-Host "   Original file: $InputFile ($([math]::Round($originalSize/1KB, 2)) KB)" -ForegroundColor Cyan
    Write-Host "   Converted file: $OutputFile ($([math]::Round($convertedSize/1KB, 2)) KB)" -ForegroundColor Cyan
    Write-Host ""
    Write-Host "Summary of changes made:" -ForegroundColor Yellow
    Write-Host "   - Table prefix: wp_ to xxml_" -ForegroundColor White
    Write-Host "   - Site URL: localhost/loulouConfiture to loulouconfiture.com" -ForegroundColor White
    Write-Host "   - Protocol: http://localhost to http://loulouconfiture.com" -ForegroundColor White
    Write-Host ""
    Write-Host "Next steps:" -ForegroundColor Yellow
    Write-Host "   1. Upload '$OutputFile' to your hosting database" -ForegroundColor White
    Write-Host "   2. Import the file via phpMyAdmin" -ForegroundColor White
    Write-Host "   3. Upload and activate your theme" -ForegroundColor White
    Write-Host ""
    
} catch {
    Write-Host "ERROR during conversion: $($_.Exception.Message)" -ForegroundColor Red
    exit 1
}

Write-Host "Ready for hosting migration!" -ForegroundColor Green