# 🧠 BroOps — Project TODO (Per Phase)

> Product: **BroOps**  
> Type: Modular Business / ERP Platform

---

## 🟢 PHASE 0 — FOUNDATION (Platform)
**Goal:** BroOps bisa login, multi-company, dan siap ditumpangi modul

### 🔐 Auth & Access
- [ ] Setup Laravel project (modular)
- [ ] Auth (JWT / Session)
- [ ] Login / Logout
- [ ] Refresh token
- [ ] Password reset
- [ ] Email verification

### 👥 User & Role
- [ ] User CRUD
- [ ] Role CRUD
- [ ] Permission CRUD
- [ ] Assign role to user
- [ ] Role per company

### 🏢 Organization
- [ ] Company CRUD
- [ ] Company settings
- [ ] User ↔ Company relation
- [ ] Switch active company

### 🧾 Platform Utilities
- [ ] Audit log
- [ ] Notification base
- [ ] App settings (timezone, currency)

---

## 🟢 PHASE 1 — BroOps Core
**Goal:** Semua modul punya fondasi operasional yang sama

### 📚 Master Data
- [ ] Department CRUD
- [ ] Position CRUD
- [ ] Project CRUD
- [ ] Cost Center CRUD
- [ ] Tag / Label (optional)

### 🔄 Workflow
- [ ] Workflow status (Draft, Approved, Posted)
- [ ] Approval rule (basic)
- [ ] Approval history

### 📄 Document System
- [ ] Document type (INV, JV, PO, dll)
- [ ] Auto numbering
- [ ] Per-company format
- [ ] Reset per year

### 📝 Activity
- [ ] Comment system
- [ ] Activity timeline
- [ ] File attachment (S3 ready)

---

## 🟡 PHASE 2 — Finance (Lite)
**Goal:** Pencatatan keuangan dasar & audit-ready

### 🧮 Accounting Core
- [ ] Chart of Accounts
- [ ] Account type
- [ ] Account mapping

### 📘 Journal
- [ ] Journal entry
- [ ] Debit / Credit validation
- [ ] Approval workflow
- [ ] Post to ledger

### 📊 Reporting
- [ ] General Ledger
- [ ] Trial Balance
- [ ] Export CSV / PDF

---

## 🟡 PHASE 3 — Inventory / Asset
**Goal:** Barang & aset ter-track dengan rapi

### 📦 Inventory
- [ ] Item master
- [ ] Warehouse
- [ ] Stock movement (IN / OUT)
- [ ] Stock balance

### 🏷️ Asset (Optional)
- [ ] Asset category
- [ ] Asset register
- [ ] Manual depreciation

---

## 🔵 PHASE 4 — HR
**Goal:** Data karyawan rapi & terstruktur

### 👤 Employee
- [ ] Employee profile
- [ ] Employment status
- [ ] Department assignment

### ⏱️ Attendance & Leave
- [ ] Attendance input (manual)
- [ ] Leave type
- [ ] Leave request
- [ ] Approval workflow

---

## 🟣 PHASE 5 — Polish & Scale
**Goal:** Siap dipakai jangka panjang & scalable

### ⚙️ Platform Improvement
- [ ] Permission fine-grain
- [ ] Feature toggle
- [ ] Soft delete strategy
- [ ] Data migration tool

### 📡 API & Integration
- [ ] Public API
- [ ] Webhook
- [ ] API rate limiting

### 🎨 UX & Branding
- [ ] Sidebar modular
- [ ] Module enable / disable
- [ ] BroOps branding v1

---

## 📌 Workflow Board
Backlog → Ready → In Progress → Review → Done

---


**Rules:**
- 1 task = max 1–2 jam
- 1 phase = usable product
- No skipping phase

---

