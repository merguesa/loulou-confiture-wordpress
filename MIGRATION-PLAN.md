# Loulou Confiture Migration Plan
## From localhost to http://loulouconfiture.com

### Pre-Migration Checklist ✅
- [x] Local database: `loulouconf.sql`
- [x] Hosting database: `db5018868834_hosting-data_io.sql`
- [x] Migration scripts created
- [x] Domain confirmed: http://loulouconfiture.com

### Step-by-Step Migration Process

#### Phase 1: Prepare Your Local Database
1. **Export your local database** (if not already done)
   ```bash
   # From your local MySQL
   mysqldump -u root -p loulouconf > loulouconf.sql
   ```

2. **Search and replace URLs in the SQL file** (optional manual step)
   - Open `loulouconf.sql` in a text editor
   - Find/Replace: `http://localhost/loulouConfiture` → `http://loulouconfiture.com`
   - Find/Replace: `localhost/loulouConfiture` → `loulouconfiture.com`

#### Phase 2: Database Migration on Hosting Server

**Option A: Clean Import (Recommended)**
1. Login to your hosting control panel (cPanel/phpMyAdmin)
2. **Backup the hosting database first!**
3. Drop all tables from your hosting database
4. Import your local database (`loulouconf.sql`)
5. Run the migration script queries in phpMyAdmin

**Option B: Use the PHP Migration Tool**
1. Upload `wp-migrate-urls.php` to your hosting root directory
2. Import your local database
3. Visit: `http://loulouconfiture.com/wp-migrate-urls.php?confirm=yes`
4. **Delete the migration file after use!**

#### Phase 3: File Upload
1. **Upload theme via WordPress Admin:**
   - Go to Appearance → Themes → Add New → Upload Theme
   - Upload the `loulou-theme.zip` we created
   - Activate the theme

2. **OR Upload via FTP:**
   - Upload `wp-content/themes/loulou-theme/` folder
   - Set proper file permissions (755 for folders, 644 for files)

#### Phase 4: Post-Migration Tasks
1. **Update wp-config.php** with hosting database credentials
2. **Login to WordPress Admin** at `http://loulouconfiture.com/wp-admin`
3. **Update Permalinks:** Settings → Permalinks → Save Changes
4. **Check plugins:** Deactivate/reactivate if needed
5. **Test Contact Form 7** functionality
6. **Verify product images** are displaying correctly
7. **Test all pages:** Boutique, Contact, À propos

#### Phase 5: Testing Checklist
- [ ] Homepage loads correctly
- [ ] Navigation menu works (including mobile)
- [ ] Dark mode toggle functions
- [ ] Product pages display properly
- [ ] Boutique page filtering/sorting works
- [ ] Contact form sends emails
- [ ] About page displays correctly
- [ ] All images load properly
- [ ] Admin area accessible

### Troubleshooting Common Issues

**Images not showing:**
```sql
UPDATE wp_posts SET post_content = REPLACE(post_content, 'localhost/loulouConfiture', 'loulouconfiture.com');
UPDATE wp_options SET option_value = REPLACE(option_value, 'localhost/loulouConfiture', 'loulouconfiture.com') WHERE option_name = 'upload_url_path';
```

**Broken internal links:**
- Go to Settings → Permalinks → Save Changes
- This refreshes WordPress URL structure

**Contact Form 7 not working:**
- Check plugin is activated
- Verify email settings in hosting control panel

### Database Credentials Template
Update your `wp-config.php` with hosting credentials:
```php
define('DB_NAME', 'your_hosting_db_name');
define('DB_USER', 'your_hosting_db_user');
define('DB_PASSWORD', 'your_hosting_db_password');
define('DB_HOST', 'localhost'); // or your hosting DB host
```

### Emergency Rollback Plan
If something goes wrong:
1. Restore hosting database from backup
2. Revert to default WordPress theme
3. Check error logs in hosting control panel

---
**Next Action:** Choose your preferred migration method (Clean Import vs PHP Tool) and proceed with Phase 2!