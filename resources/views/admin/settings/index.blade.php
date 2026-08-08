@extends('layouts.admin')
@section('page-title', 'Site Settings')
@section('content')
<div class="page-header">
    <div><div class="page-title">Site Settings</div><div class="breadcrumb">Manage <span>contact & social info</span></div></div>
</div>

<div class="card" style="max-width:800px">
    <div class="card-header"><div class="card-title"><i class="fas fa-cog" style="color:#7c3aed;margin-right:8px"></i>Contact & Social Settings</div></div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf @method('POST')

            <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:14px;padding-bottom:8px;border-bottom:1px solid #e2e8f0">
                📞 Contact Information
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Dhaka Office Phone *</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings['phone'] ?? '') }}" placeholder="+880 1XXX-XXXXXX" required>
                    @error('phone')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address *</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $settings['email'] ?? '') }}" required>
                    @error('email')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">UK Office Phone</label>
                    <input type="text" name="uk_phone" class="form-control" value="{{ old('uk_phone', $settings['uk_phone'] ?? '447300526306') }}" placeholder="+44 7XXX-XXXXXX">
                    @error('uk_phone')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <!-- Placeholder to keep layout balanced if needed, or we can just leave it as is -->
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Dhaka Office Address *</label>
                <textarea name="address" class="form-control" rows="2" required>{{ old('address', $settings['address'] ?? '') }}</textarea>
                @error('address')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">UK Office Address</label>
                <textarea name="uk_address" class="form-control" rows="2">{{ old('uk_address', $settings['uk_address'] ?? "443 Katherine Road,\nE7 8LS, United Kingdom") }}</textarea>
                @error('uk_address')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Working Hours *</label>
                <input type="text" name="hours" class="form-control" value="{{ old('hours', $settings['hours'] ?? '') }}" placeholder="Saturday - Thursday: 10 AM - 6:30 PM" required>
            </div>

            <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:14px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;margin-top:8px">
                🌐 Social Media Links
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label"><i class="fab fa-facebook-f" style="color:#1877f2;margin-right:6px"></i>Facebook URL</label>
                    <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $settings['facebook'] ?? '') }}" placeholder="https://facebook.com/...">
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fab fa-instagram" style="color:#e1306c;margin-right:6px"></i>Instagram URL</label>
                    <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $settings['instagram'] ?? '') }}" placeholder="https://instagram.com/...">
                </div>
            </div>

            <div class="form-group" style="max-width:50%">
                <label class="form-label"><i class="fab fa-whatsapp" style="color:#25d366;margin-right:6px"></i>WhatsApp Link</label>
                <input type="url" name="whatsapp" class="form-control" value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}" placeholder="https://wa.me/880XXXXXXXXXX">
            </div>

            <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:14px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;margin-top:20px">
                📊 Homepage Statistics
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Students Placed (Number)</label>
                    <input type="text" name="stat_students_target" class="form-control" value="{{ old('stat_students_target', $settings['stat_students_target'] ?? '15000') }}" placeholder="15000">
                </div>
                <div class="form-group">
                    <label class="form-label">Students Placed (Suffix)</label>
                    <input type="text" name="stat_students_suffix" class="form-control" value="{{ old('stat_students_suffix', $settings['stat_students_suffix'] ?? '+') }}" placeholder="+">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Partner Universities (Number)</label>
                    <input type="text" name="stat_universities_target" class="form-control" value="{{ old('stat_universities_target', $settings['stat_universities_target'] ?? '500') }}" placeholder="500">
                </div>
                <div class="form-group">
                    <label class="form-label">Partner Universities (Suffix)</label>
                    <input type="text" name="stat_universities_suffix" class="form-control" value="{{ old('stat_universities_suffix', $settings['stat_universities_suffix'] ?? '+') }}" placeholder="+">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Visa Success Rate (Number)</label>
                    <input type="text" name="stat_visa_target" class="form-control" value="{{ old('stat_visa_target', $settings['stat_visa_target'] ?? '96.5') }}" placeholder="96.5">
                </div>
                <div class="form-group">
                    <label class="form-label">Visa Success Rate (Suffix)</label>
                    <input type="text" name="stat_visa_suffix" class="form-control" value="{{ old('stat_visa_suffix', $settings['stat_visa_suffix'] ?? '%') }}" placeholder="%">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Years Experience (Number)</label>
                    <input type="text" name="stat_experience_target" class="form-control" value="{{ old('stat_experience_target', $settings['stat_experience_target'] ?? '18') }}" placeholder="18">
                </div>
                <div class="form-group">
                    <label class="form-label">Years Experience (Suffix)</label>
                    <input type="text" name="stat_experience_suffix" class="form-control" value="{{ old('stat_experience_suffix', $settings['stat_experience_suffix'] ?? '+') }}" placeholder="+">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Countries (Number)</label>
                    <input type="text" name="stat_countries_target" class="form-control" value="{{ old('stat_countries_target', $settings['stat_countries_target'] ?? '11') }}" placeholder="11">
                </div>
                <div class="form-group">
                    <label class="form-label">Countries (Suffix)</label>
                    <input type="text" name="stat_countries_suffix" class="form-control" value="{{ old('stat_countries_suffix', $settings['stat_countries_suffix'] ?? '') }}" placeholder="Leave blank if none">
                </div>
            </div>

            <div style="padding:14px 16px;background:#eff6ff;border:1px solid #bfdbfe;border-radius:8px;font-size:.82rem;color:#1d4ed8;margin-bottom:20px">
                <i class="fas fa-info-circle" style="margin-right:6px"></i>
                Once these settings are saved, the website’s footer, top bar, and contact section will be updated automatically.
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Settings</button>
        </form>
    </div>
</div>
@endsection
