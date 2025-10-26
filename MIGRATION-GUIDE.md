# Database Migration Checklist for Loulou Confiture

## Before Migration
- [ ] Backup both databases (local and hosting)
- [ ] Note your hosting database credentials
- [ ] Identify your hosting domain URL
- [ ] Check hosting PHP and MySQL versions

## Migration Steps

### Step 1: Prepare Local Database
1. Export your local database (`loulouconf.sql`)
2. Open the SQL file in a text editor
3. Replace all instances of:
   - `http://localhost/loulouConfiture` → `http://loulouconfiture.com`
   - `localhost/loulouConfiture` → `loulouconfiture.com`
   - Local file paths → hosting file paths (if different)

### Step 2: Database Import Strategy
**Option A: Clean Import (Recommended)**
1. Drop all tables from hosting database
2. Import your modified local database
3. Run the migration script

**Option B: Selective Import**
1. Keep hosting WordPress tables (wp_users, wp_options)
2. Import only content tables from local:
   - wp_posts (your products and pages)
   - wp_postmeta (product data)
   - wp_terms, wp_term_relationships, wp_term_taxonomy (categories)

### Step 3: Post-Migration Tasks
- [ ] Update wp-config.php with hosting database credentials
- [ ] Upload theme files via FTP or ZIP
- [ ] Test all functionality
- [ ] Update permalinks in WordPress admin
- [ ] Check Contact Form 7 settings
- [ ] Verify product images are displaying
- [ ] Test contact form functionality

## Important Notes
- Your hosting database: `db5018868834_hosting-data_io.sql`
- Your local database: `loulouconf.sql`
- Always backup before making changes
- Test thoroughly after migration

## Common Issues & Solutions
1. **Images not showing**: Update attachment URLs in wp_posts
2. **Broken links**: Run URL replacement queries
3. **Plugin conflicts**: Deactivate all plugins, then reactivate one by one
4. **Theme issues**: Re-upload theme files and check file permissions