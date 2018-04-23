# Ctype Compat

A package to make sure ctype functions still work, even if someone uses a php version that was compiled with `--disable-ctype`.

Although it will be slower for users who dont' have ctype, its still better than crashing.
