import os
for i in range(1, 31):
    try:
        os.remove(f'lvls/lvl-{i}/lvl-{i}.php')
        os.system(f'mv lvls/lvl-{i}/content.html lvls/lvl-{i}/content.php')
    except:
        pass