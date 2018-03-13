# Bracketology

## Setup

Requires PHP 7 & MySQL. Need your MySQL Password in `src/.db.token`, or an empty file if you're using `AUTH_SOCKET`.

#### Data Import

Must have each region's team data in files named 'south.txt', 'east.txt', etc.

These files must be formatted as `SEED NAME (WIN-LOSS)`, e.g.:

```
# south.txt

1 Virginia (31-0)
16 UMBC (24-10)
8 Creighton (21-11)
9 Kansas St (22-11)
```
