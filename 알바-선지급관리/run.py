from flask import Flask, render_template, request
import datetime, time

# 현재 시간 전처리
def print_current_time_korean_ampm():
    current_time_year = time.strftime("%Y-%m-%d %I:%M %p", time.localtime())
    current_time_time = time.strftime("%I:%M %p", time.localtime())
    
    # AM과 PM을 한국어로 번역
    am_pm_translation = {"AM": "오전", "PM": "오후"}
    am_pm = am_pm_translation[current_time_time[-2:]]
    am_pm_ko = am_pm[-2:]
    # 현재 시간을 한국어로 출력
    
    current_time_korean = current_time_time.replace(current_time_time[-2:], am_pm[:-2])
    
    result = am_pm_ko + " " + current_time_korean
    return result


print_current_time_korean_ampm()


run = Flask(__name__)


@run.route('/')
def index():
    return render_template('salary_loan.html')


@run.route('/result', methods=['POST', 'GET'])
def result():
    # 현재날짜
    formatted_date = time.strftime("%Y-%m-%d", time.localtime())
    # 현재 시간
    current_time = print_current_time_korean_ampm()
    

    limit = 1000000 # 한도
    # 신청금액
    input = int(request.form.get('금액입력'))
    # 수수료
    charge = int(input*0.1)
    # 지급금액 : 신청금액 - 수수료
    loan_amounts = int(input - charge)
    # 미리받기 잔액 : 한도 - 신청금액
    remain_limit = limit - input
    # 사업장선택
    selected_option = request.form.get('사업장선택')
  
    return render_template('complete_loan.html', formatted_date=formatted_date, current_time=current_time,
                           input=input, selected_option=selected_option,
                           charge=charge, loan_amounts=loan_amounts,
                           remain_limit=remain_limit
                           )


if __name__ == "__main__":
    run.run('0.0.0.0', port=9001, debug=True)


