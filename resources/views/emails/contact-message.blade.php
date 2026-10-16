{{--
  Contact-form notification email (plain, table-based HTML for client support).
  Variables: $msg = App\Models\ContactMessage
--}}
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New contact message</title>
</head>
<body style="margin:0;padding:0;background:#f0f3ff;font-family:Arial,Helvetica,sans-serif;color:#10151c;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f0f3ff;padding:24px 0;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 10px 30px -12px rgba(0,30,44,.18);">
          <tr>
            <td style="background:#005b7b;padding:20px 28px;">
              <h1 style="margin:0;font-size:18px;color:#ffffff;">New contact message</h1>
              <p style="margin:4px 0 0;font-size:13px;color:#c3e8ff;">{{ setting('identity.site_name') }}</p>
            </td>
          </tr>
          <tr>
            <td style="padding:28px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;">
                <tr>
                  <td style="padding:6px 0;color:#64748b;width:120px;">Name</td>
                  <td style="padding:6px 0;font-weight:bold;">{{ $msg->name }}</td>
                </tr>
                <tr>
                  <td style="padding:6px 0;color:#64748b;">Email</td>
                  <td style="padding:6px 0;"><a href="mailto:{{ $msg->email }}" style="color:#005b7b;">{{ $msg->email }}</a></td>
                </tr>
                @if ($msg->phone)
                  <tr>
                    <td style="padding:6px 0;color:#64748b;">Phone</td>
                    <td style="padding:6px 0;">{{ $msg->phone }}</td>
                  </tr>
                @endif
                @if ($msg->subject)
                  <tr>
                    <td style="padding:6px 0;color:#64748b;">Subject</td>
                    <td style="padding:6px 0;">{{ $msg->subject }}</td>
                  </tr>
                @endif
                <tr>
                  <td style="padding:6px 0;color:#64748b;">Received</td>
                  <td style="padding:6px 0;">{{ $msg->created_at->format('M j, Y H:i') }}</td>
                </tr>
              </table>

              <hr style="border:none;border-top:1px solid #e6e8ee;margin:20px 0;">

              <p style="margin:0 0 8px;color:#64748b;font-size:13px;">Message</p>
              <div style="font-size:15px;line-height:1.6;white-space:pre-line;">{{ $msg->message }}</div>
            </td>
          </tr>
          <tr>
            <td style="padding:16px 28px;background:#f9f9ff;font-size:12px;color:#94a3b8;">
              Sent from the {{ setting('identity.site_name') }} website contact form.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
